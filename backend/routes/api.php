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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
   //return $request->user();
//});

//Route::post('/login', 'LoginController@login');


//Route::middleware('auth:api')->get('/user' ,function (Request $request) {

    //return $request->user();
//Route::middleware('scopes:user')->get('me', 'Auth\AuthController@details');


//});
//Route::group([
  //  'middleware' => 'auth:api',
//], function (){



//Route::prefix('auth')->group(function(){
    Route::post('register', 'AuthenticatorController@register');
    Route::post('login', 'AuthenticatorController@login');
    Route::get('error', 'AuthenticatorController@error');

    //Escritorios
    Route::prefix('escritorios/')->group(function(){
        Route::get('list', 'EscritoriosController@list');
        Route::post('create', 'EscritoriosController@create');
        Route::put('update/{id}', 'EscritoriosController@update');
        Route::get('{id}', 'EscritoriosController@selectById');
        Route::post('delete/{id}', 'EscritoriosController@delete');
    });




    Route::middleware('auth:api')->group(function(){
        Route::post('logout', 'AuthenticatorController@logout');

    });
Route::prefix('product')->group(function(){
    Route::post('/create', 'ProductsController@createProduct')
    ->middleware('auth:api');
    Route::post('/delete/{productId}', 'ProductsController@deleteProduct')->middleware('auth:api');
    Route::post('/update/{productId}', 'ProductsController@updateProduct')->middleware('auth:api');
    Route::get('/list-products', 'ProductsController@listProducts')->middleware('auth:api');
    Route::get('/{productId}', 'ProductsController@selectProductById')->middleware('auth:api');

});


