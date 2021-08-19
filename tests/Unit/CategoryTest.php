<?php

namespace Tests\Unit;

use App\Models\Category;
use App\Models\User;
use Database\Seeders\CategoriesSeeder;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use DatabaseTransactions;

    public function setUp(): void
    {
        parent::setUp();

        $this->seed(CategoriesSeeder::class);
    }

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

    public function test_get_one_category()
    {
        Auth::login(User::first());

        $this->assertAuthenticated();

        $this->get(
            route(
                'category.show',
                Category::first(),
            )
        )
            ->assertOk();
    }

    public function test_create_category()
    {
        Auth::login(User::first());

        $this->assertAuthenticated();

        $this->get(route('category.create'))
            ->assertOk();

        $this->get(route('category.store'))
            ->assertOk();
    }

    public function test_update_category()
    {
        Auth::login(User::first());

        $this->assertAuthenticated();

        $this->get(
            route(
                'category.edit',
                Category::first(),
            )
        )
            ->assertOk();

        $this->get(
            route(
                'category.update',
                Category::first(),
            )
        )
            ->assertOk();
    }

    public function test_delete_category()
    {
        Auth::login(User::first());

        $this->assertAuthenticated();

        $this->get(
            route(
                'category.destroy',
                Category::first(),
            )
        )
            ->assertOk();
    }
}
