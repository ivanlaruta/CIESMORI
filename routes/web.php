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


route::get('administracion/empleados/create/form',[
		'uses' =>'administracionController@empleados_create_form',
		'as'   =>	'administracion.empleados.create.form'
	]);

route::get('administracion/empleados/create',[
		'uses' =>'administracionController@empleados_create',
		'as'   =>	'administracion.empleados.create'
	]);

Route::group(['prefix'=>'administracion','middleware'=>'auth'],function(){

	route::get('administracion/empleados/index',[
		'uses' =>'administracionController@empleados_index',
		'as'   =>	'administracion.empleados.index'
	]);

	route::get('administracion/empleados/baja',[
		'uses' =>'administracionController@empleados_baja',
		'as'   =>	'administracion.empleados.baja'
	]);


route::get('administracion/usuarios/create/form',[
		'uses' =>'administracionController@usuarios_create_form',
		'as'   =>	'administracion.usuarios.create.form'
	]);

route::get('administracion/usuarios/create',[
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