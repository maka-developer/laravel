<?php
/**
 * Git操作.
 * User: Administrator
 * Date: 2017/6/6
 * Time: 16:19
 */
namespace app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Git\GitLogModel;
use App\Model\Git\GitRepositorysModel;

class GitController extends Controller
{
    public function logView()
    {
        //获取git数据
        $git_repositorys = GitRepositorysModel::select('id','name','url','addtime','state')->get()->toArray();
        $res = [];
        if(!empty($git_repositorys)){
            foreach($git_repositorys as $key=>$value){
                $res[$key]['id'] = $value['id'];
                $res[$key]['name'] = $value['name'];
                $res[$key]['url'] = $value['url'];
                $res[$key]['addtime'] = $value['addtime'];
                $res[$key]['state'] = $value['state'];
                $logs = GitLogModel::where('repository_id',$res[$key]['id'])->orderBy('addtime','desc')->get()->toArray();
                $res[$key]['logs'] = $logs;
                $res[$key]['last_git'] = empty($logs) ? '无操作记录' : $logs[0]['addtime'];
            }
        }
        dd($res);
        return render('admin.gitLog',['list'=>$res]);
    }
}