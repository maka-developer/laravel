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

Route::get('/', function(){
    return view('welcome');
});

//test
Route::any('test','TestController@test');


//api

Route::group(['middleware' => ['web','csrf']], function () {        //带csrf
    Route::any('api/login','Admin\LoginController@login');
});

//admin 后台

Route::group(['middleware' => ['admin']], function () {     //验证session
    Route::get('/admin', 'Admin\AdminController@index');
});

//输出页面
Route::get('admin/login','Admin\LoginController@index');    //登录页
