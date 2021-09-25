<?php

namespace Tests\Unit;

use App\Models\Item;
use App\Models\User;
use Database\Seeders\ItemsSeeder;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class ItemTest extends TestCase
{
    use DatabaseTransactions;

    public function setUp(): void
    {
        parent::setUp();

        $this->seed(ItemsSeeder::class);
    }

    public function test_guest_can_not_get_categories()
    {
        $this->assertGuest();

        $this->get(route('item.index'))
            ->assertRedirect();
    }

    public function test_user_can_get_categories()
    {
        Auth::login(User::first());

        $this->assertAuthenticated();

        $this->get(route('item.index'))
            ->assertOk();
    }

    public function test_get_one_item()
    {
        Auth::login(User::first());

        $this->assertAuthenticated();

        $this->get(
            route(
                'item.show',
                Item::first(),
            )
        )
            ->assertOk();
    }

    public function test_create_item()
    {
//        Auth::login(User::first());
        $this->signIn(User::first());

        $this->assertAuthenticated();

        $this->get(route('item.create'))
            ->assertOk();

        $this->get(route('item.store'))
            ->assertOk();
    }

    public function test_update_item()
    {
        Auth::login(User::first());

        $this->assertAuthenticated();

        $this->get(
            route(
                'item.edit',
                Item::first(),
            )
        )
            ->assertOk();

        $this->get(
            route(
                'item.update',
                Item::first(),
            )
        )
            ->assertOk();
    }

    public function test_delete_item()
    {
        Auth::login(User::first());

        $this->assertAuthenticated();

        $this->get(
            route(
                'item.destroy',
                Item::first(),
            )
        )
            ->assertOk();
    }
}
