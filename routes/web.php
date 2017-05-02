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
Route::any('test','TestController@test');                            //测试方法

//api
Route::any('api/logout','Admin\LoginController@logout');          //后台登出
Route::get('api/delredis','Admin\RedisController@del');           //删除redis-key
Route::any('api/uploadimg','Api\UploadController@img');           //删除redis-key
Route::group(['middleware' => ['web','csrf']], function () {        //带csrf   -group
    Route::any('api/login','Admin\LoginController@login');         //后台登录
});

//admin 后台
Route::get('admin/login','Admin\LoginController@index');          //登录页
Route::group(['middleware' => ['admin']], function () {             //验证session -group
    Route::get('admin', 'Admin\AdminController@index');           //后台主页
    Route::get('admin/redis', 'Admin\RedisController@rlist');    //Redis list
    Route::get('admin/setting', 'Admin\AdminController@information');          //管理员个人信息修改
    Route::get('admin/user', 'Admin\UserController@userList');          //管理员个人信息修改
});


