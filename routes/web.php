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
    return view('login');
});

/* REGISTRO */

Route::prefix('registro')->group(function(){
	Route::	get('/','RegistroController@index')->name('registro');
});
/* CITAS */
Route::prefix('citas')->group(function(){
	Route::	get('/','CitasController@index')->name('citasIndex');
	Route::	get('/crear','CitasController@crearCita')->name('crearCita');
	Route::	get('/crear/{name}','CitasController@ipsCita')->name('ipsCita');	
	Route::	get('/ver','CitasController@verCita')->name('verCita');
	Route::	get('/borrar','CitasController@borrarCita')->name('borrarCita');
});


