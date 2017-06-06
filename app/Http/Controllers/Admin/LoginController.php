<?php

namespace app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }
}