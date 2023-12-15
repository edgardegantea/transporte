<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OAuthController;
use Laravel\Socialite\Facades\Socialite;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//API OAuth
Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', [OAuthController::class, 'login']);
    Route::post('signup', [OAuthController::class, 'signUp']);

    Route::group([
        'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', [OAuthController::class, 'logout']);
        Route::get('user', [OAuthController::class, 'user']);
    });
});