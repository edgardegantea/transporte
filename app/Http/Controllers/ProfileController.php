<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Usuario;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request, $id): View
    {
    $session = Auth::user();

    // Verifica si el usuario autenticado coincide con el usuario asociado al detalle
    $detalleUsuario = Usuario::where('id', $id)
                                ->where('id', $session->id)
                                ->firstOrFail();

    return view('profile.edit', [
        'user' => $request->user(),
        'detalleUsuario' => $detalleUsuario
    ]);
    }


    /**
     * Update the user's profile information.
     */
    public function update(Request $request, $id)
    {
        $session = Auth::user();

        // Validación de datos
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'nombre' => 'required|string|max:255',
            'apellidoPaterno' => 'required|string|max:255',
            'apellidoMaterno' => 'required|string|max:255',
            'sexo' => 'required|string|max:255',
            'fechaDeNacimiento' => 'required|date',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        // Actualización del usuario
        $user = User::findOrFail($id);
        $user->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
        ]);

        // Actualización del detalle del usuario
        $detalleUsuario = Usuario::where('id', $id)
            ->where('id', $session->id)
            ->firstOrFail();
        $detalleUsuario->update([
            'nombre' => $validatedData['nombre'],
            'apellidoPaterno' => $validatedData['apellidoPaterno'],
            'apellidoMaterno' => $validatedData['apellidoMaterno'],
            'sexo' => $validatedData['sexo'],
            'fechaDeNacimiento' => $validatedData['fechaNacimiento'],
        ]);

        // Redirección
        return redirect()->route('profile.edit', ['id' => $id])
            ->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
