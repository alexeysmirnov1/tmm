<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Buyer;
use App\Models\Moderator;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    public function __invoke()
    {
        Auth::login(Admin::first());

        Product::create();

        ddd(
            Auth::user(),
            Admin::all(),
            Moderator::all(),
            Buyer::all()
        );
    }
}
