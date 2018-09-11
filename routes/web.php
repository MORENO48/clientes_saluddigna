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

//Empresas
Route::resource('clientes','ClienteController');

//Empresas
/*Route::get('/empresas/create',['as' => 'empresas.create' , 'uses' => 'EmpresaController@create']);
	Route::post('/empresas',['as' => 'empresas.store' , 'uses' => 'EmpresaController@store']);
	Route::get('/empresas',['as' => 'empresas.index' , 'uses' => 'EmpresaController@index']);
	Route::get('/empresas/{id}',['as' => 'empresas.show' , 'uses' => 'EmpresaController@show']);
	Route::get('/empresas/{id}/edit',['as' => 'empresas.edit' , 'uses' => 'EmpresaController@edit']);
	Route::put('/empresas/{id}',['as' => 'empresas.update' , 'uses' => 'EmpresaController@update']);
	Route::delete('/empresas/{id}',['as' => 'empresas.destroy' , 'uses' => 'EmpresaController@destroy']);*/