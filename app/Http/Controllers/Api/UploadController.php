<?php
/*
 *  文件上传类
 *  保存路径：/public/upload
 *  默认路径: /public/upload/other
 */
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class UploadController extends Controller
{
    //上传图片
    //$clientName = $file -> getClientOriginalName();                 //上传文件名
    //$realPath = $file -> getRealPath();                             //文件temp路径
    //$mimeTye = $file -> getMimeType();                              //获取文件类型 image/png
    public function img(Request $request)
    {
        $dir = $request->input('dir','other');                              //保存的文件目录

        $file = Input::file('photo');
        if($file -> isValid()) {            //文件是否存在
            $entension = $file -> getClientOriginalExtension();               //文件后缀
            $file_name = rand(100,999).time().".".$entension;                //新文件名
            $path = $file -> move(public_path().'/upload/'.$dir,$file_name);      //路径:/public/upload/headimg/
            $url = url('public/upload/'.$dir.'/'.$file_name);              // url
            return $url;
        }else{                              //不包含图片
            return 'error';
        }
    }
}