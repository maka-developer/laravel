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
        header("Content-type: text/html; charset=utf-8");
        $resArr['request'] = $request;
        $resArr['server'] = $_SERVER;
        dd($resArr);
    }
}