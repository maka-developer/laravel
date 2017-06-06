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

class GitController extends Controller
{
    private $key = 'aaaaaa';

    public function getGit(Request $request)
    {
        header("Content-type: text/html; charset=utf-8");
//        $resArr['request'] = $request;
//        $resArr['server'] = $_SERVER;
        $resArr['X-Hub-Signature'] = $request->header('X-Hub-Signature');
        list($resArr['algo'], $resArr['hash']) = explode('=', $resArr['X-Hub-Signature'], 2);

        // 获取body内容
        $resArr['payload'] = file_get_contents('php://input');
        $resArr['payloadHash '] = hash_hmac($resArr['algo'], $resArr['payload'], $this->key);
        dd($resArr);
    }
}