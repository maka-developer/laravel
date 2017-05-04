<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\UsersModel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //删除用户
    public function add(Request $request)
    {
        $name = $request->input('name','');
        $email = $request->input('email','');
        $phone = $request->input('phone','');
        $signature = $request->input('signature','');

        //姓名验证
        if($name == ''){
            $result['code'] = -1;
            $result['msg'] = '请输入姓名';
            return response()->json($result);
        }
        //邮箱验证
        if(!preg_match('/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/',$email)){
            $result['code'] = -2;
            $result['msg'] = '邮箱格式不正确';
            return response()->json($result);
        }
        //手机号验证
        if(!preg_match('/^1[34578]\d{9}$/',$phone)){
            $result['code'] = -3;
            $result['msg'] = '手机号格式不正确';
            return response()->json($result);
        }

        $user = new UsersModel();
        $user['name'] = $name;
        $user['email'] = $email;
        $user['phone'] = $phone;
        $user['signature'] = $signature;

        //验证没写完，默认密码123456 需要确认下盐值，ajax没写完

    }
}