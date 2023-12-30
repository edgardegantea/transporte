<?php

namespace App\Http\Controllers;

use App\Models\Concesionario_unidad;
use App\Models\Unidad;
use App\Models\Usuario;
use App\Models\UsuarioConcesionario;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Prompts\Table;
use phpseclib3\Crypt\Common\AsymmetricKey;

class UnidadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $unidades = Unidad::all();

        return view('admin.unidades.index', compact('unidades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $unidades = Unidad::get();
        return view('admin.unidades.create', ['unidades' => $unidades]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $unidad = new Unidad();
        $unidad = $this->createUpdateUnit($request, $unidad);
        return redirect()->route('unidades.index');
    }

    public function createUpdateUnit(Request $request, $unidad){
        $unidad->numeroUnidad = $request->numeroUnidad;
        $unidad->marca = $request->marca;
        $unidad->modelo = $request->modelo;
        $unidad->placa = $request->placa;
        $unidad->capacidadPasajero = $request->capacidadPasajero;
        $unidad->fechaFabricacion = $request->fechaFabricacion;
        $unidad->fechaAdquisicion = $request->fechaAdquisicion;
        $unidad->tipoCombustible = $request->tipoCombustible;
        $unidad->kilometrajeActual = $request->kilometrajeActual;
        $unidad->descripcion = $request->descripcion;
        $unidad->estatus = $request->estatus;
        $unidad->save();

        /*$usuario = auth()->user();
        $id_Usuario = $usuario->id;

        $unidad->usuarios()->attach($id_Usuario);*/

        return $unidad;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $unidad = Unidad::where('id_Unidad', $id)->firstOrFail();
        return view('admin.unidades.show', ['unidad' => $unidad]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $unidad = Unidad::where('id_unidad', $id)->firstOrFail();
        return view('admin.unidades.edit', ['unidad' => $unidad]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $unidad = Unidad::where('id_unidad', $id)->firstOrFail();
        $unidad = $this->createUpdateUnit($request, $unidad);
        return redirect()->route('unidades.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $unidad = Unidad::findOrFail($id);
        try {
            $unidad->delete();
            return redirect()->route('unidades.index');
        } catch (QueryException $exception){
            return redirect()->route('unidades.index', compact('exception'));
        }
    }

    public function verPropietariosPorUnidad($id_Unidad){
        //$propietarios = Concesionario_unidad::where('id_Unidad', $id)->get();
        $propietarios = DB::table('consecionario_unidad', 'cu')
            ->JOIN('usuario as u', 'cu.id_Usuario', '=', 'u.id_Usuario')
            ->JOIN('unidad as un', 'cu.id_Unidad', '=', 'un.id_Unidad')
            ->JOIN('consecionario as c', 'u.id_Usuario', '=', 'c.id_Usuario')
            ->WHERE('cu.id_Unidad', $id_Unidad)
            ->SELECT('cu.id_consecionarioUnidad',
                            'u.id_Usuario',
                            'u.nombreUsuario',
                            DB::raw("CONCAT(u.nombre, ' ', u.apellidoPaterno, ' ', u.apellidoMaterno) as nombreCompleto"),
                            'un.numeroUnidad',
                            'c.telefono')
            ->get();

        $unidad = DB::table('unidad')->where('id_Unidad', $id_Unidad)->get();

        return view('admin.unidades.verPropietarios', compact('propietarios', 'unidad'));
    }

    public function eliminarPropietariosPorUnidad($id_consecionarioUnidad){
        $propietario = Concesionario_unidad::find($id_consecionarioUnidad);
        $propietario->delete();
        return back();
    }

    public function asignarPropietariosPorUnidad($id_Unidad){
        $unidad = Unidad::where('id_Unidad', $id_Unidad)->get();

        $consecionarios = DB::table('consecionario as c')
            ->Join('usuario as u', 'c.id_Usuario', '=', 'u.id_Usuario')
            ->Select('u.id_Usuario',
                    DB::raw("CONCAT(u.nombre, ' ', u.apellidoPaterno, ' ', u.apellidoMaterno) as nombreCompleto"))->get();
        return view('admin.unidades.asignarPropietarios', compact('unidad', 'consecionarios'));
    }

    public function guardarAsignacionPropietariosPorUnidad(Request $request){
        $unidad = $request->input('unidadSeleccionada');
        $concesionarios = $request->input('seleccionados');
        //dd($unidad, $concesionarios);
        $data = [];
        foreach ($concesionarios as $concesionario){
            //$data[] = [$concesionario, $unidad];
            Concesionario_unidad::create([
               'id_Usuario' => $concesionario,
               'id_Unidad' => $unidad
            ]);
        }
        //dd($data);
        return redirect()->route('unidades.index');
    }
}
