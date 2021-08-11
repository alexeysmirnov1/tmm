<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use DatabaseTransactions;

    public function testLoginFormOpens()
    {
        $this->get(route('login'))
            ->assertOk()
            ->assertSeeText('Login');
    }

    public function testRegistrationFormOpens()
    {
        $this->get(route('register'))
            ->assertOk()
            ->assertSeeText('Registration');
    }

    public function testUserCanLogout()
    {
        Auth::login(User::find(1));
        $this->post(route('logout'))
            ->assertStatus(302);
    }
}
