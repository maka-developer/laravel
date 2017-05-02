<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\UsersModel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //用户列表  当接收参数act = root时，显示删除按钮
    public function userList(Request $request)
    {
        $act = $request->input('act','');
        $users = UsersModel::where('state','0')->get();
        return render('admin.userList',['list'=>$users,'act' => $act]);
    }
    //添加用户
    public function userAdd()
    {
        return render('admin.userAdd');
    }
    //删除用户
    public function userDel(Request $request)
    {
        $id = $request->input('id',0);
        if($id == 0 || $id == 1){
            exit();
        }
        UsersModel::where('id',$id)->update(['state'=>1]);
        return redirect('admin/user/list');
    }
}