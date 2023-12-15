<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class SocialAuthController extends Controller
{
    public function redirectFacebook(){
        return Socialite::driver('facebook')->redirect();
    }

    public function callbackFacebook(){
        $user = Socialite::driver('facebook')->user();

        // se valida si el usuario existe, sino se crea uno nuevo 
        $user = User::firstOrCreate([
            'email' => $user->getEmail(),
        ], [
            'name' => $user->getName(),
        ]);

        // se realiza el inicio de sesión con el usuario
        auth()->login($user);

        // se redirige a la vista del dashboard
        return redirect()->to('/dashboard');
    }


    public function redirectGoogle(){
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle(){

        // se agrega el método stateless para guardar los estados de la caché de inicio de sesión
        $user = Socialite::driver('google')->stateless()->user();

        // se valida si el usuario existe, sino se crea uno nuevo 
        $user = User::firstOrCreate([
            'email' => $user->getEmail(),
        ], [
            'name' => $user->getName(),
        ]);

        // se realiza el inicio de sesión con el usuario
        auth()->login($user);

        $user->createToken($user);
        // se redirige a la vista del dashboard
        return redirect()->to('/dashboard');
    }

    public function redirectTwitter(){
        return Socialite::driver('twitter')->redirect();
    }

    public function callbackTwitter(){

        // se agrega el método stateless para guardar los estados de la caché de inicio de sesión
        $user = Socialite::driver('twitter')->stateless()->user();

        // se valida si el usuario existe, sino se crea uno nuevo 
        $user = User::firstOrCreate([
            'email' => $user->getEmail(),
        ], [
            'name' => $user->getName(),
        ]);

        // se realiza el inicio de sesión con el usuario
        auth()->login($user);

        // se redirige a la vista del dashboard
        return redirect()->to('/dashboard');
    }
}
