<?php

namespace app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Libs\VerifyUser;
use Illuminate\Support\Facades\Redis;

class TestController extends Controller
{

    public function test(Request $request)
    {
        $res = Redis::hgetall(config('rkey.ceshi.key'));
        dd($res);
    }
}