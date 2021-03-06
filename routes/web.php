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

Route::group(['middleware'=>['web']],function(){
    Route::resource('posts','PostController');
    Route::get('/','PostController@index');
    Auth::routes();
    Route::resource('categories','CategoryController',['except'=>['show','create']]);
});


