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


route::get('Encuesta/listar_tablas_db',[
		'uses' =>'EncuestaController@listar_tablas_db',
		'as'   =>	'listar_tablas_db'
	]);


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

route::post('administracion/encuestadores/create',[
		'uses' =>'administracionController@encuestadores_create',
		'as'   =>	'administracion.encuestadores.create'
	]);

route::post('administracion/encuestadores/editar',[
		'uses' =>'administracionController@encuestadores_editar',
		'as'   =>	'encuestadores.editar'
	]);

route::get('administracion/encuestadores/validar_ci',[
		'uses' =>'administracionController@validar_ci',
		'as'   =>	'administracion.encuestadores.validar_ci'
	]);


Route::resource('encuestadores', 'administracionController');

Route::group(['prefix'=>'administracion','middleware'=>'auth'],function(){

	route::get('administracion/encuestadores/index',[
		'uses' =>'administracionController@encuestadores_index',
		'as'   =>	'administracion.encuestadores.index'
	]);


route::get('administracion/encuestadores/edit/form',[
		'uses' =>'administracionController@encuestadores_edit_form',
		'as'   =>	'administracion.encuestadores.edit.form'
	]);
	route::get('administracion/encuestadores/baja',[
		'uses' =>'administracionController@encuestadores_baja',
		'as'   =>	'administracion.encuestadores.baja'
	]);

	route::get('administracion/encuestador_encuesta/baja',[
		'uses' =>'administracionController@encuestador_encuesta_baja',
		'as'   =>	'administracion.encuestador_encuesta.baja'
	]);

	route::get('administracion/encuestadores/encuestadores_admin_encuesta',[
		'uses' =>'administracionController@encuestadores_admin_encuesta',
		'as'   =>	'administracion.encuestadores.admin_encuesta'
	]);

	route::post('administracion/encuestadores/store_califica',[
		'uses' =>'administracionController@encuestadores_store_califica',
		'as'   =>	'encuestadores.store_califica'
	]);



	route::get('administracion/encuestadores/agrega_encuesta',[
		'uses' =>'administracionController@encuestadores_agrega_encuesta',
		'as'   =>	'administracion.encuestadores.agrega_encuesta'
	]);


route::get('administracion/usuarios/create/form',[
		'uses' =>'administracionController@usuarios_create_form',
		'as'   =>	'administracion.usuarios.create.form'
	]);

route::get('administracion/usuarios/create/form',[
		'uses' =>'administracionController@usuarios_create_form',
		'as'   =>	'administracion.usuarios.create.form'
	]);

route::get('administracion/usuarios/create',[
		'uses' =>'administracionController@usuarios_create',
		'as'   =>	'administracion.usuarios.create'
	]);

route::get('administracion/usuarios/editar',[
		'uses' =>'administracionController@usuarios_editar',
		'as'   =>	'administracion.usuarios.editar'
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

	route::get('administracion/usuarios/validar_user',[
		'uses' =>'administracionController@validar_user',
		'as'   =>	'administracion.usuarios.validar_user'
	]);

  route::get('administracion/personal',[
      'uses' =>'administracionController@personal',
      'as'   =>	'administracion.personal'
    ]);

});



Route::group(['prefix'=>'encuesta','middleware'=>'auth'],function(){

	route::get('encuesta/baja_libro',[
			'uses' =>'EncuestaController@baja_libro',
			'as'   =>	'encuesta.baja_libro'
		]);

	route::get('encuesta/admin_libro',[
			'uses' =>'EncuestaController@admin_libro',
			'as'   =>	'encuesta.admin_libro'
		]);



	route::get('encuesta/libroDatos',[
			'uses' =>'EncuestaController@libroDatos',
			'as'   =>	'encuesta.libroDatos'
		]);

	route::get('encuesta/migracion',[
			'uses' =>'EncuestaController@migracion',
			'as'   =>	'encuesta.migracion'
		]);

	route::get('encuesta/update_form',[
			'uses' =>'EncuestaController@update_form',
			'as'   =>	'encuesta.update_form'
		]);

	route::get('encuesta/cuota_cuidad',[
			'uses' =>'EncuestaController@cuota_cuidad',
			'as'   =>	'encuesta.cuota_cuidad'
		]);

	route::get('encuesta/cuota_cuidad_store',[
			'uses' =>'EncuestaController@cuota_cuidad_store',
			'as'   =>	'encuesta.cuota_cuidad_store'
		]);

	route::get('encuesta/cuota_cuidad_delete',[
			'uses' =>'EncuestaController@cuota_cuidad_delete',
			'as'   =>	'encuesta.cuota_cuidad_delete'
		]);

	route::get('encuesta/asigna_cliente',[
			'uses' =>'EncuestaController@asigna_cliente',
			'as'   =>	'encuesta.asigna_cliente'
		]);

	route::get('encuesta/asigna_cliente_store',[
			'uses' =>'EncuestaController@asigna_cliente_store',
			'as'   =>	'encuesta.asigna_cliente_store'
		]);

	route::get('encuesta/asigna_cliente_delete',[
			'uses' =>'EncuestaController@asigna_cliente_delete',
			'as'   =>	'encuesta.asigna_cliente_delete'
		]);

	route::post('encuesta/migrar',[
			'uses' =>'EncuestaController@migrar',
			'as'   =>	'encuesta.migrar'
		]);


	route::post('encuesta/store_libro',[
			'uses' =>'EncuestaController@store_libro',
			'as'   =>	'encuesta.store_libro'
		]);

	route::post('encuesta/editar',[
			'uses' =>'EncuestaController@editar',
			'as'   =>	'encuesta.editar'
		]);

	route::get('encuesta/actualizar',[
			'uses' =>'EncuestaController@actualizar',
			'as'   =>	'encuesta.actualizar'
		]);

	route::get('encuesta/cambiar_estado',[
			'uses' =>'EncuestaController@cambiar_estado',
			'as'   =>	'encuesta.cambiar_estado'
		]);

	route::get('encuesta/contenido_detalle',[
			'uses' =>'EncuestaController@contenido_detalle',
			'as'   =>	'encuesta.contenido_detalle'
		]);

	route::get('encuesta/dashboard',[
			'uses' =>'EncuestaController@dashboard',
			'as'   =>	'encuesta.dashboard'
		]);



  route::get('encuesta/personal',[
			'uses' =>'EncuestaController@personal',
			'as'   =>	'encuesta.personal'
		]);


	route::get('encuesta/gis',[
			'uses' =>'EncuestaController@gis',
			'as'   =>	'encuesta.gis'
		]);

	route::get('encuesta/map',[
			'uses' =>'EncuestaController@map',
			'as'   =>	'encuesta.map'
		]);

	Route::resource('encuesta', 'EncuestaController');

});
