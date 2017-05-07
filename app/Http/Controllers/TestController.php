<?php

namespace app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Libs\VerifyUser;

class TestController extends Controller
{

    public function test(Request $request)
    {
        $user['phone'] = $request->input('phone','');
        $user['email'] = $request->input('email','');
        $user['user'] = $request->input('user','');

        $res = VerifyUser::setUser($user);
        return response()->json($res);
    }
}