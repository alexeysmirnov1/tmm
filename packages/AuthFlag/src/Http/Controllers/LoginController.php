<?php

namespace Flagstudio\AuthFlag\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class LoginController extends BaseController
{
    public function index()
    {
        return view('vendor.AuthFlag.auth-flag.login');
    }
}
