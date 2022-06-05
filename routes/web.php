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

Route::get('/', function () { return view('welcome'); });
Route::get('/club', function () { return view('club'); });
Route::get('/evento', function () { return view('evento'); });
Route::get('/galeria', function () { return view('galeria'); });
Route::get('/socio', [SocioController::class, 'vistaSocio'])->name('socio');
Route::get('/unete', function () { return view('unete'); });
Route::get('/legal', function () { return view('legal'); });
Route::get('/privacidad', function () { return view('privacidad'); });
Route::get('/cookie', function () { return view('cookie'); });
Route::get('/administrador', function () { return view('administrador'); });
Route::get('/usuario', function () { return view('usuario'); });

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
    Route::post('socios/estado/{id}', [SocioController::class, 'estado'])->name('socios.estado');
});

// Users
Route::group(['middleware' => ['permission:users.lista']], function () {
    Route::resource('users', UserController::class)->names('users');
});

// EventoDetalles

Route::group(['middleware' => ['permission:eventodetalles.lista']], function () {
    Route::resource('eventodetalles', EventoDetalleController::class)->names('eventodetalles');
});
