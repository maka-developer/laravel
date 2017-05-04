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
        //个性签名设置
        if(strlen($signature) > 100){
            $result['code'] = -4;
            $result['msg'] = '个性签名过长';
            return response()->json($result);
        }

        $userModel = new UsersModel();
        $userModel->name = $name;
        $userModel->user = $name;
        $userModel->email = $email;
        $userModel->phone = $phone;
        $userModel->signature = $signature;
        $userModel->hash = '$2y$10$ZaVJ6hf2ne5kZHvRBbqObuz78QDIKUKqHzLXBXsR3sMN.xbdXO1kG'; //123456
        $userModel->state = 0;
        $userModel->save();

        $result['code'] = 0;
        return response()->json($result);
    }
}