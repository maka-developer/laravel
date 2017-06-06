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
    private $secret = 'aaaaaa';

    public function getGit(Request $request)
    {
        header("Content-type: text/html; charset=utf-8");
        //获取 Signature
        $hubSignature  = $request->header('X-Hub-Signature');
        list($algo, $hash) = explode('=', $hubSignature , 2);
        // 获取body内容
        $payload = file_get_contents('php://input');
        // 计算签名
        $payloadHash = hash_hmac($algo, $payload, $this->secret);
        if ($hash !== $payloadHash) { //签名不匹配
            throw new Exception("hash is not true");
        }
        $hook = $request->input('hook');
        dd($hook);
    }
}