<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//Route::prefix('auth')->group(function(){
    Route::post('register', 'AuthenticatorController@register');
    Route::post('login', 'AuthenticatorController@login');
    Route::post('logout', 'AuthenticatorController@logout')->middleware('auth:api');
    Route::get('error', 'AuthenticatorController@error');


Route::middleware('auth:api')->group(function () {

    //Escritorios
    Route::prefix('escritorios/')->group(function(){
        Route::get('list', 'EscritoriosController@list');
        Route::post('create', 'EscritoriosController@create');
        Route::put('update/{id}', 'EscritoriosController@update');
        Route::get('{id}', 'EscritoriosController@selectById');
        Route::post('delete/{id}', 'EscritoriosController@delete');
    });
    //Planos
    Route::prefix('planos/')->group(function(){
        Route::get('list', 'PlanosController@list');
        Route::post('create', 'PlanosController@create');
        Route::put('update/{id}', 'PlanosController@update');
        Route::get('{id}', 'PlanosController@selectById');
        Route::post('delete/{id}', 'PlanosController@delete');
    });
    //Clientes
    Route::prefix('clientes/')->group(function(){
        Route::get('list', 'ClientesController@list');
        Route::post('create', 'ClientesController@create');
        Route::put('update/{id}', 'ClientesController@update');
        Route::get('{id}', 'ClientesController@selectById');
        Route::post('delete/{id}', 'ClientesController@delete');
    });
    //Funcionarios
    Route::prefix('usuarios/')->group(function(){
        Route::get('list/{id}', 'FuncionariosController@list');
        Route::post('create', 'FuncionariosController@create');
        Route::put('update/{id}', 'FuncionariosController@update');
        Route::get('{id}', 'FuncionariosController@selectById');
        Route::post('delete/{id}', 'FuncionariosController@delete');
    });

});


