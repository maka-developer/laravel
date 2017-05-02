<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Libs\Power;
use App\Model\UsersModel;

class UserController extends Controller
{

    public function userList()
    {
        $user = Power::user();
        $user['nav_active'] = 'user';
        $user['active'] = 'user_list';

        $users = UsersModel::where('state','0')->get();

        return view('admin.userList',['user'=>$user,'list'=>$users]);
    }
}