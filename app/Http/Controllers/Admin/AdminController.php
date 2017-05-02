<?php

namespace app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Libs\Power;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index()
    {
        return render('admin.index');
    }

    public function information()
    {
        return render('admin.setting');
    }

    //修改用户信息
    public function update(Request $requeset)
    {
        $name = $requeset->name;
        $headimg = $requeset->headimg;


    }
}