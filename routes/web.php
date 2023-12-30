<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocialAuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Unidades
    Route::resource('/unidades', \App\Http\Controllers\UnidadController::class)->names('unidades');
    Route::get('unidades/propietarios/{id_Unidad}', [\App\Http\Controllers\UnidadController::class, 'verPropietariosPorUnidad'])->name('verPropietarios');
    Route::delete('unidades/propietarios/eliminar/{id_consecionarioUnidad}', [\App\Http\Controllers\UnidadController::class, 'eliminarPropietariosPorUnidad'])->name('eliminarPropietarios');
    Route::get('unidades/propietarios/asignar/{id_Unidad}', [\App\Http\Controllers\UnidadController::class, 'asignarPropietariosPorUnidad'])->name('asignarPropietarios');
    Route::post('unidades/propietarios/asignar/guardar', [\App\Http\Controllers\UnidadController::class, 'guardarAsignacionPropietariosPorUnidad'])->name('guardarAsignacionPropietarios');
});

require __DIR__.'/auth.php';

// Rutas de logueo con Facebook
Route::get('/auth/redirectFacebook', [SocialAuthController::class, 'redirectFacebook'])->name('auth.redirectFacebook');
Route::get('/auth/callbackFacebook', [SocialAuthController::class, 'callbackFacebook'])->name('auth.callbackFacebook');

// Rutas de logueo con Google
Route::get('/auth/redirectGoogle', [SocialAuthController::class, 'redirectGoogle'])->name('auth.redirectGoogle');
Route::get('/auth/callbackGoogle', [SocialAuthController::class, 'callbackGoogle'])->name('auth.callbackGoogle');

// Rutas de logueo con Twitter
Route::get('/auth/redirectTwitter', [SocialAuthController::class, 'redirectTwitter'])->name('auth.redirectTwitter');
Route::get('/auth/callbackTwitter', [SocialAuthController::class, 'callbackTwitter'])->name('auth.callbackTwitter');

// Redirecciones y devoluciones de llamada de Socialite
Route::get('login/{provider}', 'SocialAuthController@redirectToProvider');
Route::get('login/{provider}/callback', 'SocialAuthController@handleProviderCallback');
