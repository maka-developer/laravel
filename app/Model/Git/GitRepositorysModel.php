<?php

namespace App\Model\Git;

use Illuminate\Database\Eloquent\Model;

class GitRepositorysModel extends Model{

    protected $table = 'git_repositorys';

    protected $primaryKey = 'id';

    public $timestamps = false;

    public function logs()
    {
        return $this->hasMany('App\Model\Git\GitLogModel', 'repository_id', 'id');
    }
}