<?php

namespace App\Http\Controllers\API;

use App\Contracts\PaymentGatewayContract;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    private PaymentGatewayContract $gateway;

    public function __construct(PaymentGatewayContract $gateway)
    {
        $this->gateway = $gateway;
    }

    //...
}
