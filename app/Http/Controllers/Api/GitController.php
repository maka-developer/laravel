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
    private $key = 'aaaaaa';

    public function getGit(Request $request)
    {
        header("Content-type: text/html; charset=utf-8");
        $resArr['request'] = $request;
        $resArr['server'] = $_SERVER;
        $resArr['x-github-delivery'] = $request->header('x-github-delivery');
        $resArr['sh1'] = $this->getSignature($this->key, $resArr['x-github-delivery']);
        dd($resArr);
    }

    function getSignature($str, $key) {
        if (function_exists('hash_hmac')) {
            $signature = base64_encode(hash_hmac("sha1", $str, $key, true));
        } else {
            $blocksize = 64;
            $hashfunc = 'sha1';
            if (strlen($key) > $blocksize) {
                $key = pack('H*', $hashfunc($key));
            }
            $key = str_pad($key, $blocksize, chr(0x00));
            $ipad = str_repeat(chr(0x36), $blocksize);
            $opad = str_repeat(chr(0x5c), $blocksize);
            $hmac = pack(
                'H*', $hashfunc(
                    ($key ^ $opad) . pack(
                        'H*', $hashfunc(
                            ($key ^ $ipad) . $str
                        )
                    )
                )
            );
            $signature = base64_encode($hmac);
        }
        return $signature;
    }
}