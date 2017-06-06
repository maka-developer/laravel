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
Route::any('api/logout','Api\LoginController@logout');          //后台登出
Route::get('api/delredis','Api\RedisController@del');           //删除redis-key
Route::any('api/uploadimg','Api\UploadController@img');           //上传图片（纯上传）
Route::get('api/user/del','Api\UserController@userDel');        //删除用户
Route::post('api/git/getPush','Api\GitController@getGit');        //获取git触发 不带csrf
Route::group(['middleware' => ['web','csrf']], function () {        //带csrf   -group
    Route::any('api/login','Api\LoginController@login');         //后台登录
    Route::any('api/user/add','Api\UserController@add');         //后台登录
});

//admin 后台 view
Route::get('admin/login','Admin\LoginController@index');          //登录页
Route::group(['middleware' => ['admin']], function () {             //验证session -group
    Route::get('admin', 'Admin\AdminController@index');           //后台主页
    Route::get('admin/redis', 'Admin\RedisController@rlist');    //Redis list
    Route::get('admin/setting', 'Admin\AdminController@information');          //管理员个人信息修改
    Route::get('admin/user/list', 'Admin\UserController@userList');          //用户列表
    Route::get('admin/user/add', 'Admin\UserController@userAdd');          //增加用户
    Route::get('admin/git/log', 'Admin\GitController@logView');          //Git日志
});


