<?php

namespace app\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Libs\Curl;
use Illuminate\Http\Request;
use App\Libs\VerifyUser;
use Illuminate\Support\Facades\Redis;

class TestController extends Controller
{

    public function test(Request $request)
    {
        $url = "http://loodp.com/";
        $curl = new Curl($url);
        $res = $curl->request([], 'GET', '', 1);

        dd($res);
    }
}