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
        dd($git_repositorys);
        exit();
        $res = [];
        if(!empty($git_repositorys)){
            foreach($git_repositorys as $git_repository){
                $res[$key]['id'] = $git_repository->id;
                $res[$key]['name'] = $git_repository->name;
                $res[$key]['url'] = $git_repository->url;
                $res[$key]['addtime'] = $git_repository->addtime;
                $res[$key]['state'] = $git_repository->state;
                $res[$key]['logs'] = GitLogModel::where('repository_id',$res[$key]['id'])->orderBy('addtime','desc')->get();
                $res[$key]['log_count'] = GitLogModel::where('repository_id',$res[$key]['id'])->count();
            }
        }
        dd($res);
        exit();
        return render('admin.gitLog',['list'=>$git_repositorys]);
    }
}