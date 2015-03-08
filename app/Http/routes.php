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

Route::get('/', 'InicioController@getIndex');
Route::get('login', 'LoginController@getIndex');

//Rutas de Tipo de Red
Route::get('tipored', array('as'=>'tipored','uses'=>'TiporedController@getIndex'));
Route::get('tipored/Nuevo', array('as'=>'NuevoTipored','uses'=>'TiporedController@getNuevo'));
Route::post('tipored/Crear', array('uses'=>'TiporedController@postCrear'));

//Rutas de Fichas 
Route::get('ficha', array('as'=>'ficha','uses'=>'FichaController@getIndex'));
Route::get('ficha/Nuevo', array('as'=>'NuevaFicha','uses'=>'FichaController@getNuevo'));
Route::post('ficha/Crear', array('uses'=>'FichaController@postCrear'));
Route::get('ficha/{id_ficha}/Editar', array('as'=>'EditarFicha','uses'=>'FichaController@getEditar'));
Route::post('ficha/Actualizar', array('uses'=>'FichaController@postActualizar'));
Route::post('ficha/Eliminar', array('uses'=>'FichaController@deleteActivarInactivar'));

//Rutas de Usuarios
Route::get('usuario', array('as'=>'usuario','uses'=>'UsuarioController@getIndex'));
Route::get('usuario/Nuevo', array('as'=>'NuevoUsuario','uses'=>'UsuarioController@getNuevo'));
Route::post('usuario/Crear', array('uses'=>'UsuarioController@postCrear'));
Route::get('usuario/{id_usuario}/Editar', array('as'=>'EditarUsuario','uses'=>'UsuarioController@getEditar'));
Route::post('usuario/Actualizar', array('uses'=>'UsuarioController@postActualizar'));
Route::post('usuario/Eliminar', array('uses'=>'UsuarioController@deleteActivarInactivar'));


//Route::get('usuarionuevo', 'UsuarioController@nuevo');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
