<?php

use App\Http\Controllers\CitasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MedicosController;
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


Route::resource('citas',CitasController::class);
Route::resource('login',LoginController::class);
Route::resource('medicos',MedicosController::class);

