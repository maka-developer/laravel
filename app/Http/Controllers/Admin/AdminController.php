<?php

namespace app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Libs\Power;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index(Request $request)
    {
        $user = Power::user();                  //根据用户信息抓取视图层需要的数据  （菜单，头像，姓名）
        $user['active'] = '';
        $user['nav_active'] = '';

        return view('admin.index',['user'=>$user]);       //active:菜单选中状态   nav-active:跟菜单打开状态
    }
}