<?php

namespace App\Http\Controllers;

use App\Models\Unidad;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class UnidadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $unidades = Unidad::all();

        return view('unidades.index', ['unidades' => $unidades]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $unidades = Unidad::get();
        return view('unidades.create', ['unidades' => $unidades]);
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

        $usuario = auth()->user();
        $id_Usuario = $usuario->id;

        $unidad->usuarios()->attach($id_Usuario);

        return $unidad;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $unidad = Unidad::where('id_Unidad', $id)->firstOrFail();
        return view('unidades.show', ['unidad' => $unidad]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $unidad = Unidad::where('id_unidad', $id)->firstOrFail();
        return view('unidades.edit', ['unidad' => $unidad]);
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
}
