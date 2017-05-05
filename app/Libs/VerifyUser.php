<?php
/**
 *  记录或验证用户唯一值
 */
namespace App\Libs;
use Illuminate\Support\Facades\Redis;

class RSetUser
{
    private $email_redis_hashKey = 'sys::user::email';      //保存email
    private $phone_redis_hashKey = 'sys::user::phone';      //保存phone
    private $user_redis_hashKey  = 'sys::user::user';       //保存user名

    /*
     * 将用户唯一值信息存入redis email、phone、user
     * code: 0 成功
     * msg：错误信息
     */
    public function setUser($user)
    {
        $email = $user['email'];
        $phone = $user['phone'];
        $name  = $user['user'];

        //redis事务处理同时存入
    }
    /*
     * 查询email是否存在
     * code：0 不存在
     * msg：错误信息
     */
    public function getEmail($email)
    {

    }
}