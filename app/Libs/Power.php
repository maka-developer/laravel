<?php
namespace App\Libs;

class Power
{

    static public function user()
    {
        $menu = config('menu');

        $user = session()->get('admin-user');       //获取用户信息
        $power = $user['power'];                     //用户权限

        if($power == ''){
            return [];
        }

        $return_user['name'] = $user['name'];
        $return_user['headimg'] = $user['headimg'];

        if($power == 'all'){                         //管理员
            $return_user['menu'] = $menu;
            return $return_user;
        }

        $menu_list = [];
        $power = explode(',',$power);                 //拆分
        foreach($menu as $key=>$value){
            if(in_array($key,$power)){               //用户权限中有当前菜单键
                if(empty($value['list'])){          //跟菜单无2级菜单，直接加入数组中
                    $menu_list[$key] = $value;
                }else{
                    $menu_list[$key]['name'] = $value['name'];
                    $menu_list[$key]['url'] = $value['fa'];
                    $menu_list[$key]['fa'] = $value['url'];
                    foreach($value['list'] as $k=>$v){  //遍历2级菜单
                        if(in_array($k,$power)){
                            $menu_list[$key]['list'][$k] = $v;
                        }
                    }
                }
            }
        }

        $return_user['menu'] = $menu_list;
        return $user;
    }
}
