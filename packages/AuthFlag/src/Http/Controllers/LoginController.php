<?php

namespace Flagstudio\AuthFlag\Http\Controllers;

use Flagstudio\AuthFlag\Http\Requests\LoginClientRequest;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class LoginController extends BaseController
{
    public function page()
    {
        return view('vendor.AuthFlag.auth-flag.login');
    }

    public function login(LoginClientRequest $request)
    {
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ], true)) {
            return redirect()->route('home');
        }

        abort(401);
    }
}
