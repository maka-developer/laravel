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


//test
Route::any('test','TestController@test');

Route::get('/', function () {
    return view('test.welcome');
});

Route::get('test/set','Admin\AdminController@test');
Route::get('test/get','Admin\AdminController@get');
