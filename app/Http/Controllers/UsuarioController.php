<?php

namespace App\Http\Controllers;

use Laravel\RESTful\ResourceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    public function index()
    {
        return view('usuarios.create');
    }

    public function create(Request $request)
    {
        $rules = [
            'nombre' => 'required|min:2|max:50',
            'apellidoPaterno' => 'required|min:2|max:50',
            'apellidoMaterno' => 'required|min:2|max:50',
            'sexo' => 'required',
            'fechaDeNacimiento' => 'required',
        ];

        $request->validate($rules);

        // Obtener el ID del usuario autenticado
        $idUsuario = Auth::id();

        // Asociar el ID del users al nuevo registro en la tabla 'usuarios'
        $request->merge(['id' => $idUsuario]);

        Usuario::create($request->all());

        return redirect()->route('dashboard')->with('success', 'Usuario registrado con éxito');
    }

    public function destroy($id)
    {
        $usuario = Auth::user();

        // Asegurarse de que el usuario autenticado solo pueda eliminar sus propios registros
        $usuarios = Usuario::where('id', $usuario->id)->findOrFail($id);
        
        $usuarios->delete();

        return redirect()->route('dashboard')->with('success', 'Usuario eliminado con éxito');
    }
}
