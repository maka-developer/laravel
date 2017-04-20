<?php

namespace app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct(Request $request)
    {

    }

    public function index(Request $request)
    {
        //待写

        session()->forget('user');

        $user = $request->session()->all();
        var_dump($user);
        exit();

        return view('admin.index');
    }
}