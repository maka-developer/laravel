<?php
/**
 * 微信二维码
 * User: lee
 * Date: 2017/6/6
 * Time: 16:19
 */
namespace app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Libs\Curl;

class WxController extends Controller
{

    public function index()
    {
        $rArr['token'] = md5(time() . rand(100000,999999));
        $rArr['time'] = time();
        $url = "https://wx.loodp.com/wxbg?token=".$rArr['token'];
        $curl = new Curl($url);
        $res = $curl->request([],'GET','',1,'all');
        dd($res);
    }
}