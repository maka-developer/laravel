<?php
/**
 * Git操作.
 * User: Administrator
 * Date: 2017/6/6
 * Time: 16:19
 */
namespace app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Git\GitRepositorysModel;

class GitController extends Controller
{
    public function logView()
    {
        //获取git数据
        $git_repositorys = GitRepositorysModel::all();
        foreach($git_repositorys as $key=>$value){
            var_dump($value);
            echo "<br>";
        };
//        dd($git_repositorys);
        exit();
        return render('admin.gitLog');
    }
}