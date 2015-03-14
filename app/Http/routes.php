<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', [
	'uses' => 'LoginController@getIndex', 
	'as' => 'login'
]);

Route::get('login', 'LoginController@getIndex');

//Rutas de Tipo de Red
Route::get('tipored', array('as'=>'tipored','uses'=>'TiporedController@getIndex'));
Route::get('tipored/Nuevo', array('as'=>'NuevoTipored','uses'=>'TiporedController@getNuevo'));
Route::post('tipored/Crear', array('uses'=>'TiporedController@postCrear'));

Route::get('parroquia', array('as'=>'parroquia','uses'=>'ParroquiaController@getIndex'));
Route::get('parroquia/Nuevo', array('as'=>'NuevaParroquia','uses'=>'ParroquiaController@getNuevo'));
Route::post('parroquia/Crear', array('uses'=>'ParroquiaController@postCrear'));
Route::get('parroquia/{id_parroquia}/Editar', array('as'=>'EditarParroquia','uses'=>'ParroquiaController@getEditar'));
Route::post('parroquia/Actualizar', array('uses'=>'ParroquiaController@postActualizar'));
Route::post('parroquia/Eliminar', array('uses'=>'ParroquiaController@deleteActivarInactivar'));

Route::get('barrio', array('as'=>'barrio','uses'=>'BarrioController@getIndex'));
Route::get('barrio/Nuevo', array('as'=>'NuevoBarrio','uses'=>'BarrioController@getNuevo'));
Route::post('barrio/Crear', array('uses'=>'BarrioController@postCrear'));
Route::get('barrio/{id_barrio}/Editar', array('as'=>'EditarBarrio','uses'=>'BarrioController@getEditar'));
Route::post('barrio/Actualizar', array('uses'=>'BarrioController@postActualizar'));
Route::post('barrio/Eliminar', array('uses'=>'BarrioController@deleteActivarInactivar'));


//Rutas de Fichas 
Route::get('ficha', array('as'=>'ficha','uses'=>'FichaController@getIndex'));
Route::get('ficha/Buscar/{id}', array('as'=>'BuscarFicha','uses'=>'FichaController@getBuscar'));
Route::get('ficha/Nuevo', array('as'=>'NuevaFicha','uses'=>'FichaController@getNuevo'));
Route::post('ficha/Crear', array('uses'=>'FichaController@postCrear'));
Route::post('ficha/Editar', array('uses'=>'FichaController@postEditar'));
Route::post('ficha/Actualizar', array('uses'=>'FichaController@postActualizar'));
Route::post('ficha/Eliminar', array('uses'=>'FichaController@deleteActivarInactivar'));
Route::get('reporteficha', array('as'=>'reporteficha','uses'=>'FichaController@getReporteficha'));


//Rutas de Usuarios
Route::get('usuario', array('as'=>'usuario','uses'=>'UsuarioController@getIndex'));
Route::get('usuario/Nuevo', array('as'=>'NuevoUsuario','uses'=>'UsuarioController@getNuevo'));
Route::post('usuario/Crear', array('uses'=>'UsuarioController@postCrear'));
Route::get('usuario/{id_usuario}/Editar', array('as'=>'EditarUsuario','uses'=>'UsuarioController@getEditar'));
Route::post('usuario/Actualizar', array('uses'=>'UsuarioController@postActualizar'));
Route::post('usuario/Eliminar', array('uses'=>'UsuarioController@deleteActivarInactivar'));
Route::get('Salir', 'UsuarioController@getSalir');

//Route::get('usuarionuevo', 'UsuarioController@nuevo');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
