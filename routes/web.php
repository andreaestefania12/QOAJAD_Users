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

Route::prefix('/inicio')->group(function(){
    Route::	get('/pag','LoginController@inicio')->name('inicio');
    Route::	get('/','LoginController@cerrar')->name('cerrar');
});

/* REGISTRO */

Route::prefix('registro')->group(function(){
	Route::	get('/','RegistroController@index')->name('registro');
	Route::	post('/crear','RegistroController@registrar');
});


/* CITAS */
Route::prefix('citas')->group(function(){
	Route::	get('/','CitasController@index')->name('citasIndex');
	Route::	get('/crear','CitasController@crearCita')->name('crearCita');
	Route::	get('/ver','CitasController@verCita')->name('verCita');
	Route::	get('/editar','CitasController@editar')->name('editar');
	Route::	get('crear/{ips}','CitasController@ipsCita')->name('ipsCita');
	Route::	get('crear/{ips}/{esp}','CitasController@espCita')->name('espCita');	
	Route::	get('/borrar','CitasController@borrarCita')->name('borrarCita');
	Route::	get('/borrar/{id}','CitasController@borrarConfirma')->name('borrarConfirma');
	Route::	get('/modificar','CitasController@actualizarCita')->name('actualizar');
	Route::	get('/modificar/{id}','CitasController@actualizarIPS')->name('modificar');
	Route::	get('actualizar/{ips}','CitasController@actualizarESP')->name('actualizarESP');
	Route::	get('actualizar/{ips}/{esp}','CitasController@actualizarHorario')->name('actualizarHorario');
	Route::	get('actualizar/nueva/{doctorDocument}/{date}','CitasController@guardarNuevaCita')->name('guardarNuevaCita');


	
});


/*BORRAR CITAS*/



Route::prefix('guardar')->group(function(){
	Route::	get('/{doctorDocument}/{date}','CitasController@guardarCita')->name('guardar');
});
/* LOGIN */

Route::prefix('login')->group(function(){
	Route::	get('/','LoginController@index')->name('login');

});

//* USUARIO */

Route::prefix('usuario')->group(function(){
Route::	get('/','UsuarioController@index')->name('perfil');
Route::	get('/correo','UsuarioController@Usuario')->name('usuario');
Route::	get('/correoNuevo','UsuarioController@setUsuario')->name('setUsuario');
Route::	get('/contraseña','UsuarioController@Contra')->name('contra');
Route::	get('/contraseñaNueva','UsuarioController@setContr')->name('setContr');
});

/* HISTORIA */ 

Route::prefix('/historia')->group(function(){ 
	Route::get('/', 'PDFController@getHistoria')->name('historia');
	Route::get('/pdf', 'PDFController@PDF')->name('downloadPDF');
});
