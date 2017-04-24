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
		
      	$arr = array();
        $keys = Redis::keys('*');
      	if(!empty($keys)){
          foreach($keys as $item){
            $arr[$item] = Redis::type($item);
          }
        }
        dd($arr);
      	exit();

        return view('admin.redis',['user'=>$user]);       //active:菜单选中状态   nav-active:跟菜单打开状态
    }
}