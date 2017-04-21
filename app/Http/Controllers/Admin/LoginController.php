<?php

namespace app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\UsersModel;
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

        //数据库  model  用户验证逻辑
        $user = UsersModel::where('user',$user)->first();   //按照用户名查询数据库
        if(empty($user)){           //没有用户
            echo 1;
            exit();
        }
        $hash = $user->hash;        //获得hash值

        if (password_verify($pass, $hash)) {
            echo 't';
        }
        else {
            
            echo 'f';
        }


        exit();
    }
}