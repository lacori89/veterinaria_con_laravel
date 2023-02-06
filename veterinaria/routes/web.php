<?php

use Illuminate\Support\Facades\Route;

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

Route::resource('clientes', App\Http\Controllers\ClienteController::class)->middleware('auth');
Route::resource('tipomascota', App\Http\Controllers\TipomascotumController::class)->middleware('auth');
Route::resource('mascota', App\Http\Controllers\MascotumController::class)->middleware('auth');
Route::resource('cita', App\Http\Controllers\CitumController::class)->middleware('auth');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/calendario', function () {
    return view('calendario');
});
Route::get('/calendarioDe/{fecha}', [App\Http\Controllers\CitumController::class, 'calendarioDeFecha']);
