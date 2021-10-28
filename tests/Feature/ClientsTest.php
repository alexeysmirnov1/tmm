<?php

namespace Tests\Feature;

use App\Models\Client;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class ClientsTest extends TestCase
{
    use DatabaseTransactions;

    public function setUp(): void
    {
        parent::setUp();
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
                Client::first(),
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
                Client::first(),
            )
        )
            ->assertOk();

        $this->post(
            route(
                'clients.update',
                Client::first(),
            )
        )
            ->assertStatus(301)
            ->assertRedirect(route('dashboard'));
    }

    public function test_delete_client()
    {
        $this->signIn(User::first());

        $this->assertAuthenticated();

        $this->get(
            route(
                'clients.destroy',
                Client::first(),
            )
        )
            ->assertOk();
    }
}
