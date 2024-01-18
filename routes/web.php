<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocialAuthController;
use App\Http\Controllers\UsuarioController;

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
    Route::get('/profile/edit/{id}', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/vista', [UsuarioController::class, 'mostrarUsuario']);

    Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
    Route::post('/usuarios/create', [UsuarioController::class, 'create'])->name('usuarios.create');
    Route::post('/usuarios/store', [UsuarioController::class, 'store'])->name('usuarios.store');
    Route::get('/usuarios/{id}', [UsuarioController::class, 'show'])->name('usuarios.show');
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