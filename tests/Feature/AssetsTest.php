<?php

namespace Tests\Feature;

use App\Models\Asset;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class AssetsTest extends TestCase
{
    use DatabaseTransactions;

    public function setUp(): void
    {
        parent::setUp();
    }

    public function test_guest_can_not_get_assets()
    {
        $this->assertGuest();

        $this->get(route('assets.index'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function test_user_can_get_assets()
    {
        $this->signIn(User::first());

        $this->assertAuthenticated();

        $this->get(route('assets.index'))
            ->assertOk();
    }

    public function test_get_one_asset()
    {
        $this->signIn(User::first());

        $this->assertAuthenticated();

        $this->get(
            route(
                'assets.show',
                Asset::first(),
            )
        )
            ->assertOk();
    }

    public function test_create_asset()
    {
        $this->signIn(User::first());

        $this->assertAuthenticated();

        $request = [
            'date' => '2021-10-27',
        ];

        $this->get(route('assets.create', $request))
            ->assertOk()
            ->assertSeeText('Create asset')
            ->assertViewHas('sources')
            ->assertViewHas('workTime');

        $this->post(route('assets.store'))
            ->assertOk();
    }

    public function test_update_asset()
    {
        $this->signIn(User::first());

        $this->assertAuthenticated();

        $this->get(
            route(
                'assets.edit',
                Asset::first(),
            )
        )
            ->assertOk();

        $this->post(
            route(
                'assets.update',
                Asset::first(),
            )
        )
            ->assertStatus(301)
            ->assertRedirect(route('dashboard'));
    }

    public function test_delete_asset()
    {
        $this->signIn(User::first());

        $this->assertAuthenticated();

        $this->get(
            route(
                'assets.destroy',
                Asset::first(),
            )
        )
            ->assertOk();
    }
}
