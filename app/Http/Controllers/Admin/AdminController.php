<?php

namespace app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use app\Model\TestModel;

class AdminController extends Controller
{

    public function test()
    {

        $t = new TestModel();
        return $t->test();
    }
}