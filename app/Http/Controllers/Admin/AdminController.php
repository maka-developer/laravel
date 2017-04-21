<?php

namespace app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Libs\Power;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index(Request $request)
    {

        $menu = Power::menu();                      //根据用户权限获取菜单

        return view('admin.index');
    }
}