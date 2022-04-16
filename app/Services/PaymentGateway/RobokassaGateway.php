<?php

namespace App\Services\PaymentGateway;

use App\Contracts\PaymentGatewayContract;

class RobokassaGateway implements PaymentGatewayContract
{
    private string $username;
    private string $password;

    public function __construct(string $username, string $password)
    {
        $this->username = $username;

        $this->password = $password;
    }
    //...
}
