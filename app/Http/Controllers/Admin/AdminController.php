<?php

namespace app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Libs\Power;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index()
    {
        $user = Power::user();                                //根据用户信息抓取视图层需要的数据  （菜单，头像，姓名）
        $user['active'] = 'home';                           //active:菜单选中状态

        return view('admin.index',['user'=>$user]);
    }

    public function information()
    {
        $user = Power::user();

        return view('admin.setting',['user'=>$user]);
    }

    //修改用户信息
    public function update(Request $requeset)
    {
        $name = $requeset->name;
        $headimg = $requeset->headimg;

    }
}