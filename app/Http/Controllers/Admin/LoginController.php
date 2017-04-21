<?php

namespace app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\UsersModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }
    //登录方法
    public function login(Request $request)
    {
        $user = $request->user;     //用户名
        $pass = $request->pass;     //密码

        //数据库  model  用户验证逻辑
        $user = UsersModel::where('user',$user)->first();   //按照用户名查询数据库
        //dd($user['attributes']);                           //attributes获得数据中数组
        if(empty($user)){           //没有用户
            $result['code'] = 10;
            return response()->json($result);
        }
        $hash = $user->hash;        //获得hash值

        if (password_verify($pass, $hash)) {    //密码验证成功
            Session::put('admin-user',$user['attributes']);
            $result['code'] = 200;
            return response()->json($result);
        }else {                                 //密码验证失败
            $result['code'] = 10;
            return response()->json($result);
        }
    }
    //登出
    public function logout()
    {
        Session::forget('admin-user');         //清空session
        return redirect('admin/login');
    }
}