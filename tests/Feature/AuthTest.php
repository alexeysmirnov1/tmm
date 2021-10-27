<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use DatabaseTransactions;

    public function testLoginFormOpens()
    {
        $this->assertGuest();

        $this->get(route('login'))
            ->assertOk()
            ->assertSeeText('Login');
    }

    public function testRegistrationFormOpens()
    {
        $this->assertGuest();

        $this->get(route('register'))
            ->assertOk()
            ->assertSeeText('Registration');
    }

    public function testUserCanLogout()
    {
        $this->signIn(User::first());

        $this->assertAuthenticated();

        $this->post(route('logout'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }
}
