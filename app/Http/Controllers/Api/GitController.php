<?php
/**
 * github webhock api.
 * User: Administrator
 * Date: 2017/6/6
 * Time: 17:02
 */
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Git\GitLogModel;
use App\Model\Git\GitRepositorysModel;
use Illuminate\Http\Request;

class GitController extends Controller
{
    /**
     * 验证
     * @param $hook array 提交关键信息，主要查看触发事件类型
     * @param $hubSignature string 验证签名
     * @param $hubDelivery string 唯一id
     * @param $repositorie_name string 项目名
     */
    public function getGit(Request $request)
    {
        header("Content-type: text/html; charset=utf-8");
        //获取参数
        $hook = $request->input('hook');
        $repository = $request->input('repository');
        $hubSignature  = $request->header('X-Hub-Signature');   //签名
        $hubDelivery  = $request->header('X-GitHub-Delivery');   //唯一id
        $repositorie_name = $repository['name'];    //项目名
        $payload = file_get_contents('php://input');        //body内容

        //定义变量
        $secret = '';
        $path = '';
        $shell = '';

        //查询是否存在
        $git_repository = GitRepositorysModel::where('name',$repositorie_name)->first();
        if(empty($git_repository)){     //未找到数据,创建一条
            $git_repository = new GitRepositorysModel();
            $git_repository['name'] = $repositorie_name;
            $git_repository['secret'] = '';
            $git_repository['path'] = '';
            $git_repository['shell'] = '';
            $git_repository['state'] = 0;
            $git_repository->save();
        }else{
            $secret = $git_repository->secret;
            $path = $git_repository->path;
            $shell = $git_repository->shell;
        }
        //沒有shell命令
        if($shell === ''){
            $git_log = new GitLogModel();
            $git_log['delivery'] = $hubDelivery;
            $git_log['shellCode'] = 400;
            $git_log['shellRes'] = '';
            $git_log['error'] = 1;
            $git_log['errorMsg'] = '沒有shell命令';
            $git_log->save();
            abort(403);
            $resArr['code'] = 4031;
            $resArr['msg'] = '没有shell命令';
            return response()->json();
        }
        //判断是否push请求
        if($hook['events'][0] != 'push'){
            $git_log = new GitLogModel();
            $git_log['delivery'] = $hubDelivery;
            $git_log['shellCode'] = 400;
            $git_log['shellRes'] = '';
            $git_log['error'] = 1;
            $git_log['errorMsg'] = '不是push请求';
            $git_log->save();
            abort(403);
            $resArr['code'] = 4032;
            $resArr['msg'] = '不是push触发';
            return response()->json();
        }
        list($algo, $hash) = explode('=', $hubSignature , 2);
        // 计算签名
        $payloadHash = hash_hmac($algo, $payload, $secret);
        if ($hash !== $payloadHash) { //签名不匹配
            $git_log = new GitLogModel();
            $git_log['delivery'] = $hubDelivery;
            $git_log['shellCode'] = 400;
            $git_log['shellRes'] = '';
            $git_log['error'] = 1;
            $git_log['errorMsg'] = '签名不匹配';
            $git_log->save();
            abort(403);
            $resArr['code'] = 4033;
            $resArr['msg'] = '签名不匹配';
            return response()->json();
        }
        //生成shell命令
        $shel_str = 'cd '.$path.';'.$shell;
        exec($shel_str, $shell_res, $shell_code);
        $git_log = new GitLogModel();
        $git_log['delivery'] = $hubDelivery;
        $git_log['shellCode'] = $shell_code;
        $git_log['shellRes'] = json_encode($shell_res);
        $git_log['error'] = 0;
        $git_log['errorMsg'] = '';
        $git_log->save();
        if($shell_code != 0){   //shell执行失败
            abort(403);
            $resArr['code'] = 4034;
            $resArr['msg'] = 'shell执行失败';
            return response()->json();
        }else{
            $resArr['code'] = 200;
            $resArr['msg'] = 'success';
            return response()->json();
        }
    }
}