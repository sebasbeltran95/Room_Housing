<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DueñosController;
use App\Http\Controllers\PropiedadesController;
use App\Http\Controllers\RastreoController;

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
    return view('inicio');
});

// reservas
Route::controller(PropiedadesController::class)->group(function(){
    Route::get('/propiedades','index')->name('propiedades.ver');
    Route::post('/propiedadesinsertar', 'store')->name('propiedades.insertar');
    Route::post('/propiedadesactualizar', 'update')->name('propiedadesactualizar');
    Route::delete('/propiedadesdestroy/{id}', 'destroy')->name('propiedades.destroy');
    Route::post('/propiedadesfiltro','filtro_name')->name('propiedadesfiltroname');
});

