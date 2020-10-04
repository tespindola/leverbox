<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\admin\SolicitudesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Rutas del backend (esto funcion por que las rutas de vuejs para el frontend estan debajo de todo)
Route::prefix('server')->group(function(){

    // Login
    Route::post('login', [LoginController::class, 'login']);
    Route::post('register', [LoginController::class, 'register']);
    Route::post('checkLogin', [LoginController::class, 'checkLogin']);

    // Solicitudes crear
    Route::post('solicitud/create', [SolicitudesController::class, 'create']);

    Route::middleware(['verificarLogin'])->group(function(){

        // Obtener solicitudes
        Route::post('solicitud/get', [SolicitudesController::class, 'getSolicitudes']);

        // Login
        Route::post('logout', [LoginController::class, 'logout']);

    });


});

// De esta manera hacemos que Vuejs tome control de las rutas del frontend
Route::get('/{any}', function(){
    return view('index');
})->where('any', '.*');
