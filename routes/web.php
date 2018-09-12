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


Route::get('/',['as' => 'clientes.index' , 'uses' => 'ClienteController@index']);
//Route::resource('clientes','ClienteController');

//Clientes
Route::get('/clientes/create',['as' => 'clientes.create' , 'uses' => 'ClienteController@create']);
Route::post('/clientes',['as' => 'clientes.store' , 'uses' => 'ClienteController@store']);
Route::get('/clientes',['as' => 'clientes.index' , 'uses' => 'ClienteController@index']);
Route::get('/clientes/{id}',['as' => 'clientes.show' , 'uses' => 'ClienteController@show']);
Route::get('/clientes/{id}/edit',['as' => 'clientes.edit' , 'uses' => 'ClienteController@edit']);
Route::put('/clientes/{id}',['as' => 'clientes.update' , 'uses' => 'ClienteController@update']);
Route::delete('/clientes/{id}',['as' => 'clientes.destroy' , 'uses' => 'ClienteController@destroy']);