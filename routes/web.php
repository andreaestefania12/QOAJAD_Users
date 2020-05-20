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
	Route::	get('/menu','CitasController@index')->name('citasIndex');
	Route::	get('/','CitasController@crearCita')->name('crearCita');
	Route::	get('/ver','CitasController@verCita')->name('verCita');
	Route::	get('/borrar','CitasController@borrarCita')->name('borrarCita');
	Route::	get('/{ips}','CitasController@ipsCita')->name('ipsCita');
	Route::	get('/{ips}/{esp}','CitasController@espCita')->name('espCita');	
});

/* LOGIN */

Route::prefix('login')->group(function(){
	Route::	get('/','LoginController@index')->name('login');
});

/* USUARIO */
Route::prefix('usuario')->group(function(){
	Route::	get('/','UsuarioController@index')->name('perfil');
	Route::	get('/correo','UsuarioController@Usuario')->name('usuario');
	Route::	get('/s','UsuarioController@setUsuario')->name('setUsuario');
	Route::	get('/contraseña','UsuarioController@Contra')->name('contra');
	Route::	get('/ss','UsuarioController@setContr')->name('setContr');
});

/* PDF */
Route::get('/pdf', 'PDFController@PDF')->name('downloadPDF');




/* HISTORIA */ 

Route::get('/historia', function(){ 
	return view('historiaClinica');
})-> name('historia');

