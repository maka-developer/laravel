<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Libs\Power;
use App\Model\UsersModel;

class UserController extends Controller
{
    //用户列表
    public function userList()
    {
        $users = UsersModel::where('state','0')->get();

        return render('admin.userList',['list'=>$users]);
    }
    //添加用户
    public function userAdd()
    {
        return render('admin.userAdd');
    }
}