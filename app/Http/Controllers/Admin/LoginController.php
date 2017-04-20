<?php

namespace app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{


    public function index()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $user = $request->user;     //用户名
        $pass = $request->pass;     //密码

        $hash = password_hash($pass,PASSWORD_BCRYPT);   //密码加密

        //数据库  model  用户验证逻辑

        echo $hash;
    }
}