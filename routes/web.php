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



Auth::routes();


Route::group(['middleware' => ['auth']], function() {
    Route::get('/','HomeController@index')->name('index');

    //抽取
    Route::post('/extract','PokemonController@extract');

    //宝可梦详情
    Route::get('/pokemon/{id}','PokemonController@show')->middleware('pokemon');

    //进化
    Route::put('/evolve/{id}','PokemonController@evolve')->middleware('pokemon');

    //使用道具
    Route::put('/pror','PokemonController@pror')->middleware('pokemon');

    //测试礼包
    Route::post('/test','PokemonController@test')->name('test');

});






