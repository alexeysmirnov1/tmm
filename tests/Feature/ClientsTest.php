<?php

namespace Tests\Feature;

use App\Models\Liability;
use App\Models\User;
use Database\Seeders\ClientSeeder;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class ClientsTest extends TestCase
{
    use DatabaseTransactions;

    public function setUp(): void
    {
        parent::setUp();

        $this->seed(ClientSeeder::class);
    }

    public function test_guest_can_not_get_clients()
    {
        $this->assertGuest();

        $this->get(route('clients.index'))
            ->assertRedirect();
    }

    public function test_user_can_get_clients()
    {
        $this->signIn(User::first());

        $this->assertAuthenticated();

        $this->get(route('clients.index'))
            ->assertOk();
    }

    public function test_get_one_client()
    {
        $this->signIn(User::first());

        $this->assertAuthenticated();

        $this->get(
            route(
                'clients.show',
                Liability::first(),
            )
        )
            ->assertOk();
    }

    public function test_create_client()
    {
        $this->signIn(User::first());

        $this->assertAuthenticated();

        $this->get(route('clients.create'))
            ->assertOk();

        $this->post(route('clients.store'))
            ->assertOk();
    }

    public function test_update_client()
    {
        $this->signIn(User::first());

        $this->assertAuthenticated();

        $this->get(
            route(
                'clients.edit',
                Liability::first(),
            )
        )
            ->assertOk();

        $this->post(
            route(
                'clients.update',
                Liability::first(),
            )
        )
            ->assertOk();
    }

    public function test_delete_client()
    {
        $this->signIn(User::first());

        $this->assertAuthenticated();

        $this->get(
            route(
                'clients.destroy',
                Liability::first(),
            )
        )
            ->assertOk();
    }
}
