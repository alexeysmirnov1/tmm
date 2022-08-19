<?php

namespace Flagstudio\AuthFlag;

use Illuminate\Support\Facades\Facade;

class AuthFlagFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'auth.flag';
    }
}
