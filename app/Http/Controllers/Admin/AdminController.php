<?php

namespace app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use app\Model\TestModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class AdminController extends Controller
{

    public function test(Request $request)
    {
        $key = $request->get('key');
        $value = $request->get('value');

        $set = Redis::set($key,$value);

        echo $set;
    }

    public function get(Request $request)
    {
        $key = $request->get('key');

        $value = Redis::get($key);

        echo $value;
    }
}