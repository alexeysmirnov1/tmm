<?php

namespace App\Http\Controllers;

use App\Contracts\PaymentGatewayContract;

class PaymentController extends Controller
{
    private PaymentGatewayContract $gateway;

    public function __construct(PaymentGatewayContract $gateway)
    {
        $this->gateway = $gateway;
    }

    //...
}
