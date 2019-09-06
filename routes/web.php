<?php

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

Route::get('/inicio', function () {
    return view('welcome');
})->name('inicio');

Route::get('/vacio', function () {
    return view('vacio');
})->name('vacio');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/session', 'SesionController@index')->name('session');


route::get('administracion/encuestadores/create/form',[
		'uses' =>'administracionController@encuestadores_create_form',
		'as'   =>	'administracion.encuestadores.create.form'
	]);

route::get('administracion/encuestadores/create/nolog_form',[
		'uses' =>'administracionController@encuestadores_create_nolog_form',
		'as'   =>	'administracion.encuestadores.create.nolog_form'
	]);

route::get('administracion/encuestadores/create/log_form',[
		'uses' =>'administracionController@encuestadores_create_log_form',
		'as'   =>	'administracion.encuestadores.create.log_form'
	]);

route::get('administracion/encuestadores/create',[
		'uses' =>'administracionController@encuestadores_create',
		'as'   =>	'administracion.encuestadores.create'
	]);



Route::group(['prefix'=>'administracion','middleware'=>'auth'],function(){

	route::get('administracion/encuestadores/index',[
		'uses' =>'administracionController@encuestadores_index',
		'as'   =>	'administracion.encuestadores.index'
	]);

	route::get('administracion/encuestadores/baja',[
		'uses' =>'administracionController@encuestadores_baja',
		'as'   =>	'administracion.encuestadores.baja'
	]);


route::get('administracion/usuarios/create/form',[
		'uses' =>'administracionController@usuarios_create_form',
		'as'   =>	'administracion.usuarios.create.form'
	]);

route::get('administracion/usuarios/create/form',[
		'uses' =>'administracionController@usuarios_create_form',
		'as'   =>	'administracion.usuarios.create.form'
	]);

route::post('administracion/usuarios/create',[
		'uses' =>'administracionController@usuarios_create',
		'as'   =>	'administracion.usuarios.create'
	]);


	route::get('administracion/usuarios/index',[
		'uses' =>'administracionController@usuarios_index',
		'as'   =>	'administracion.usuarios.index'
	]);

	route::get('administracion/usuarios/baja',[
		'uses' =>'administracionController@usuarios_baja',
		'as'   =>	'administracion.usuarios.baja'
	]);

	route::get('administracion/usuarios/finder',[
		'uses' =>'administracionController@usuarios_finder',
		'as'   =>	'administracion.usuarios.finder'
	]);



	

});