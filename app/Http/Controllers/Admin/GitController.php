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
        dd($git_repositorys);
        $res = [];
        if(!empty($git_repositorys)){
            foreach($git_repositorys as $git_repository){
                $id = $git_repository->id;
                $res[$id]['id'] = $git_repository->id;
                $res[$id]['name'] = $git_repository->name;
                $res[$id]['url'] = $git_repository->url;
                $res[$id]['addtime'] = $git_repository->addtime;
                $res[$id]['state'] = $git_repository->state;
                $res[$id]['logs'] = GitLogModel::where('repository_id',$res[$id]['id'])->orderBy('addtime','desc')->get();
            }
        }
        return render('admin.gitLog',['list'=>$res]);
    }
}