<?php

namespace Tests\Feature;

use App\Models\Liability;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class LiabilitiesTest extends TestCase
{
    use DatabaseTransactions;

    public function setUp(): void
    {
        parent::setUp();
    }

    public function test_guest_can_not_get_liabilities()
    {
        $this->assertGuest();

        $this->get(route('liabilities.index'))
            ->assertRedirect();
    }

    public function test_user_can_get_liabilities()
    {
        $this->signIn(User::first());

        $this->assertAuthenticated();

        $this->get(route('liabilities.index', [now()]))
            ->assertOk();
    }

    public function test_get_one_liability()
    {
        $this->signIn(User::first());

        $this->assertAuthenticated();

        $this->get(
            route(
                'liabilities.show',
                Liability::first(),
            )
        )
            ->assertOk();
    }

    public function test_create_liability()
    {
        $this->signIn(User::first());

        $this->assertAuthenticated();

        $this->get(route('liabilities.create'))
            ->assertOk();

        $this->post(route('liabilities.store'))
            ->assertOk();
    }

    public function test_update_liability()
    {
        $this->signIn(User::first());

        $this->assertAuthenticated();

        $this->get(
            route(
                'liabilities.edit',
                Liability::first(),
            )
        )
            ->assertOk();

        $this->post(
            route(
                'liabilities.update',
                Liability::first(),
            )
        )
            ->assertStatus(301)
            ->assertRedirect(route('dashboard'));
    }

    public function test_delete_liability()
    {
        $this->signIn(User::first());

        $this->assertAuthenticated();

        $this->get(
            route(
                'liabilities.destroy',
                Liability::first(),
            )
        )
            ->assertOk();
    }
}
