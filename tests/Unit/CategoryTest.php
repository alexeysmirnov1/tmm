<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    public function test_guest_can_not_get_categories()
    {
        $this->assertGuest();

        $this->get(route('category.index'))
            ->assertRedirect();
    }

    public function test_user_can_get_categories()
    {
        Auth::login(User::first());

        $this->assertAuthenticated();

        $this->get(route('category.index'))
            ->assertOk();
    }
}
