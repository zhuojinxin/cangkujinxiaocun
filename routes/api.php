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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['prefix'=>'user','as'=>'user','middleware'=>'auth:api'],function(){
    Route::get('/info','Api\UserController@getinfo');
    Route::get('/all','Api\UserController@getAll');

    Route::post('/info','Api\UserController@update');
    Route::post('/userinfo','Api\UserController@userinfo');
    Route::post('/changeduty','Api\UserController@changeduty');
    Route::delete('/del/{id}','Api\UserController@del');



});

Route::group(['prefix'=>'goods','as'=>'goods','middleware'=>'auth:api'],function(){
    Route::get('/info','Api\GoodController@getinfo');
    Route::post('/info','Api\GoodController@create');
    Route::get('/{id}','Api\GoodController@findgood');
    Route::delete('/del/{id}','Api\GoodController@del');

});

Route::group(['prefix'=>'erp','as'=>'erp','middleware'=>'auth:api'],function(){
    Route::get('/info','Api\WarehouseController@getinfo');
    Route::post('/info','Api\WarehouseController@create');
    Route::get('/stock','Api\StockpileController@getinfo');
    Route::post('/ruku','Api\RuchukuController@ruku');
    Route::post('/chuku','Api\RuchukuController@chuku');
    Route::get('/log','Api\RuchukuController@AlljiLu');
    Route::delete('/del/{id}','Api\WarehouseController@del');


});