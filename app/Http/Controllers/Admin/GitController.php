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
        $git_repositorys = GitRepositorysModel::select('id','name','url','addtime','state')->get();
        $res = [];
        if(!empty($git_repositorys)){
            foreach($git_repositorys as $key=>$value){
                $res[$key]['id'] = $git_repositorys->id;
                $res[$key]['name'] = $git_repositorys->name;
                $res[$key]['url'] = $git_repositorys->url;
                $res[$key]['addtime'] = $git_repositorys->addtime;
                $res[$key]['state'] = $git_repositorys->state;
                $res[$key]['logs'] = GitLogModel::where('repository_id',$res[$key]['id'])->orderBy('addtime','desc')->get();
                $res[$key]['log_count'] = GitLogModel::where('repository_id',$res[$key]['id'])->count();
            }
        }
        dd($res);
        exit();
        return render('admin.gitLog',['list'=>$git_repositorys]);
    }
}