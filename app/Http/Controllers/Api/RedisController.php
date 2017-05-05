<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Libs\Power;
use Illuminate\Support\Facades\Redis;
use Illuminate\Http\Request;

class RedisController extends Controller
{
    //删除redis-key
    public function del(Request $request)
    {
        $key = $request->key;
        Redis::delete($key);
        return redirect('admin/redis');
    }
}