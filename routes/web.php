<?php

use Illuminate\Support\Facades\Route;
Use App\http\Controllers\ColaboradorController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\EventoDetalleController;
use App\Http\Controllers\GaleriaController;
use App\Http\Controllers\PatrocinadorController;
use App\Http\Controllers\SocioController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Colaboradores
Route::group(['middleware' => ['permission:colaboradores.lista']], function () {
    Route::resource('colaboradores', ColaboradorController::class)->names('colaboradores');
});

// Eventos
Route::group(['middleware' => ['permission:eventos.lista']], function () {
    Route::resource('eventos', EventoController::class)->names('eventos');
});

// Galerías
Route::group(['middleware' => ['permission:galerias.lista']], function () {
    Route::resource('galerias', GaleriaController::class)->names('galerias');
});

// Patrocinadores
Route::group(['middleware' => ['permission:patrocinadores.lista']], function () {
    Route::resource('patrocinadores', PatrocinadorController::class)->names('patrocinadores');
});

// Socios
Route::group(['middleware' => ['permission:socios.lista']], function () {
    Route::resource('socios', SocioController::class)->names('socios');
});

// Users
Route::group(['middleware' => ['permission:users.lista']], function () {
    Route::resource('users', UserController::class)->names('users');
});

// EventoDetalles

Route::group(['middleware' => ['permission:eventodetalles.lista']], function () {
    Route::resource('eventodetalles', EventoDetalleController::class)->names('eventodetalles');
});
