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

Route::get('/', 'InicioController@index');

Route::get('ficha', 'FichaController@index');
Route::get('fichanuevo', 'FichaController@nuevo');

Route::get('home', 'HomeController@index');


//oute::get('tipored', 'TiporedController@getIndex');
Route::get('tipored', array('as'=>'tipored','uses'=>'TiporedController@getIndex'));


Route::get('usuario', 'UsuarioController@index');
Route::get('usuarionuevo', 'UsuarioController@nuevo');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
