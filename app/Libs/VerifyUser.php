<?php
/**
 *  记录或验证用户唯一值
 */
namespace App\Libs;
use Illuminate\Support\Facades\Redis;

class VerifyUser
{
    static private $email_redis_sKey = 'sys::user::email';      //保存email
    static private $phone_redis_sKey = 'sys::user::phone';      //保存phone
    static private $user_redis_sKey  = 'sys::user::user';       //保存user名

    /*
     * 将用户唯一值信息存入redis email、phone、user
     * code: 0 成功
     * msg：错误信息
     */
    static public function setUser($user)
    {
        $email = $user['email'];
        $phone = $user['phone'];
        $name  = $user['user'];

        //redis事务处理同时存入
        $ret = Redis::multi()
            ->sadd(self::$email_redis_sKey,$email)
            ->sadd(self::$phone_redis_sKey,$phone)
            ->sadd(self::$user_redis_sKey,$name)
            ->exec();

        return $ret;
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