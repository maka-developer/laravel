<?php
/**
 * 请求辅助类
 * User: Lee
 * Date: 2017/7/3
 * Time: 14:40
 */
namespace App\Libs;

class Curl
{
    private $url;

    public function __construct($url)
    {
        $this->url = $url;
    }

    /**
     * @param array $post   Post请求参数
     * @param string $request   请求方式 Get|POST
     * @param string $cookie    传入cookie
     * @param int $json     是否解析json
     * @param string $data  结果处理（带头部|只有内容）
     * @return array|mixed
     */
    public function request($post=array(),$request='GET',$cookie='',$json = 0, $data='all')
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, urldecode(json_encode($post)));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $request);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_TIMEOUT, 15);      //超时时间设置
        curl_setopt($ch, CURLOPT_HEADER, TRUE);
        if($cookie!=''){
            curl_setopt($ch, CURLOPT_COOKIE, $cookie);
        }
        $content = curl_exec($ch);
        curl_close($ch);
        if(!$content){
            return $content;
        }
        list($header, $body) = explode("\r\n\r\n", $content);
        $cookie = '';
        $header = explode('Set-Cookie: ',$header);
        foreach ($header as $key => $value) {
            if($key!=0){
                $string = explode(' Domain=',$value);
                $cookie = $cookie.$string[0];
            }
        }
        if($json==1){
            $body = json_decode($body,true);
        }
        $content = array(
            'cookie' => $cookie,
            'body' => $body
        );
        if($data=='all'){
            return $content;
        }else{
            return $content[$data];
        }
    }
}