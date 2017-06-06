<?php
/**
 * github webhock api.
 * User: Administrator
 * Date: 2017/6/6
 * Time: 17:02
 */
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class GitController extends Controller
{
    public function getGit(Request $request)
    {

        Redis::hmset(config('rkey.ceshi.key'),$request->toArray());
        Redis::hmset(config('rkey.ceshi.key'),$_SERVER);
    }
}