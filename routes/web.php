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

	

});