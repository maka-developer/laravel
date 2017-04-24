<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Libs\Power;
use Illuminate\Support\Facades\Redis;
use Illuminate\Http\Request;

class RedisController extends Controller
{

    public function rlist()
    {
        $user = Power::user();                  //根据用户信息抓取视图层需要的数据  （菜单，头像，姓名）
        $user['active'] = 'redis';
        $user['nav_active'] = '';
		
      	$list = array();
        $keys = Redis::keys('*');
      	if(!empty($keys)){
            foreach($keys as $key=>$value){
                $list[$key]['key']  = $value;
                $type = Redis::type($value);
                switch ($type)
                {
                    case 1:
                        $list[$key]['type'] = '字符串';
                        break;
                    case 2:
                        $list[$key]['type'] = '集合';
                        break;
                    case 3:
                        $list[$key]['type'] = '列表';
                        break;
                    case 4:
                        $list[$key]['type'] = '有序集合';
                        break;
                    case 5:
                        $list[$key]['type'] = '散列';
                        break;
                    default:
                        $list[$key]['type'] = '未知';
                        break;
                }
            }
        }

        return view('admin.redis',['user'=>$user,'list'=>$list]);       //active:菜单选中状态   nav-active:跟菜单打开状态
    }

    public function del(Request $request)
    {
        $key = $request->key;
        Redis::delete($key);
        return redirect('admin/redis');
    }
}