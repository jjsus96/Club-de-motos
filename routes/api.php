<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\GaleriaController;
use App\Http\Controllers\SocioController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//Route::post('login', [LoginController::class, 'login']);

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/socios', [SocioController::class, 'datosSocio']);
Route::get('/galerias', [GaleriaController::class, 'datosGaleria']);
Route::get('/eventos', [EventoController::class, 'datosEvento']);
