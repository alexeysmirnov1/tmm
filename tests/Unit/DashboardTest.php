<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    public function test_guest_can_not_open_dashboard()
    {
        $this->assertGuest();

        $this->get(route('dashboard'))
            ->assertRedirect();
    }

    public function test_user_can_open_dashboard()
    {
        Auth::login(User::first());

        $this->assertAuthenticated();

        $this->get(route('dashboard'))
            ->assertOk()
            ->assertSeeText('Dashboard');
    }
}
