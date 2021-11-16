<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    public function test_guest_can_not_open_dashboard()
    {
        $this->assertGuest();

        $this->get(route('dashboard'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function test_user_can_open_dashboard()
    {
        $this->signIn(User::first());

        $this->assertAuthenticated();

        $this->get(route('dashboard'))
            ->assertOk()
            ->assertSeeText('Dashboard');
    }
}
