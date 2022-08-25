<?php

namespace Flagstudio\AuthFlag;

use Flagstudio\AuthFlag\Http\Controllers\LoginController;

class AuthFlag
{
    public function authFlag()
    {
        return function ($options = []) {
            $this->middleware('guest')
                ->group(function () {
                $this->get(config('auth-flag.url'), [LoginController::class, 'page'])
                    ->name('flag.auth.form');

                $this->post(config('auth-flag.url'), [LoginController::class, 'login'])
                    ->name('flag.auth.login');
            });
        };
    }
}
