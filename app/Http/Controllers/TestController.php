<?php

namespace app\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Libs\Test;

class TestController extends Controller
{

    public function test()
    {
        $test = new Test();
        echo $test->test();
    }
}