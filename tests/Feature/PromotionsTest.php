<?php

namespace Tests\Feature;

use App\Models\Promotion;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class PromotionsTest extends TestCase
{
    use DatabaseTransactions;

    public function setUp(): void
    {
        parent::setUp();
    }

    public function test_guest_can_not_get_promotions()
    {
        $this->assertGuest();

        $this->get(route('promotions.index'))
            ->assertRedirect();
    }

    public function test_user_can_get_promotion()
    {
        $this->signIn(User::first());

        $this->assertAuthenticated();

        $this->get(route('promotions.index'))
            ->assertOk();
    }

    public function test_get_one_promotion()
    {
        $this->signIn(User::first());

        $this->assertAuthenticated();

        $this->get(
            route(
                'promotions.show',
                Promotion::first(),
            )
        )
            ->assertOk();
    }

    public function test_create_promotion()
    {
        $this->signIn(User::first());

        $this->assertAuthenticated();

        $this->get(route('promotions.create'))
            ->assertOk();

        $this->post(route('promotions.store'))
            ->assertOk();
    }

    public function test_update_promotion()
    {
        $this->signIn(User::first());

        $this->assertAuthenticated();

        $this->get(
            route(
                'promotions.edit',
                Promotion::first(),
            )
        )
            ->assertOk();

        $this->post(
            route(
                'promotions.update',
                Promotion::first(),
            )
        )
            ->assertStatus(301)
            ->assertRedirect(route('dashboard'));
    }

    public function test_delete_promotion()
    {
        $this->signIn(User::first());

        $this->assertAuthenticated();

        $this->get(
            route(
                'promotions.destroy',
                Promotion::first(),
            )
        )
            ->assertOk();
    }
}
