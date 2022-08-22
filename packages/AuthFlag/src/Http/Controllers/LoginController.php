<?php

namespace Flagstudio\AuthFlag\Http\Controllers;

use Flagstudio\AuthFlag\Http\Requests\LoginClientRequest;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class LoginController extends BaseController
{
    public function index()
    {
        return view('vendor.AuthFlag.auth-flag.login');
    }

    public function store(LoginClientRequest $request)
    {
        Auth::attempt([
            'email' => $request->login,
            'password' => $request->password,
        ]);

        dd(Auth::user());

        return redirect()->route(route('home'));
    }
}
