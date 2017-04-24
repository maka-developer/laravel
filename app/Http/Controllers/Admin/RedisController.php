<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Libs\Power;
use Illuminate\Support\Facades\Redis;

class RedisController extends Controller
{

    public function rlist()
    {
        $user = Power::user();                  //根据用户信息抓取视图层需要的数据  （菜单，头像，姓名）
        $user['active'] = 'redis';
        $user['nav_active'] = '';

        $keys = Redis::keys('*');
        var_dump($keys);

        return view('admin.redis',['user'=>$user]);       //active:菜单选中状态   nav-active:跟菜单打开状态
    }
}