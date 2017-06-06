<?php

namespace App\Model\Git;

use Illuminate\Database\Eloquent\Model;

class GitLogModel extends Model{

    protected $table = 'git_log';

    protected $primaryKey = 'id';

    public $timestamps = false;
}