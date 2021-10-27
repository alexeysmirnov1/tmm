<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\User;
use Database\Seeders\CategoriesSeeder;
use Illuminate\Foundation\Testing\DatabaseTransactions;
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
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function test_user_can_get_categories()
    {
        $this->signIn(User::first());

        $this->assertAuthenticated();

        $this->get(route('category.index'))
            ->assertOk();
    }

    public function test_get_one_category()
    {
        $this->signIn(User::first());

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
        $this->signIn(User::first());

        $this->assertAuthenticated();

        $this->get(route('category.create'))
            ->assertOk();

        $this->post(route('category.store'))
            ->assertOk();
    }

    public function test_update_category()
    {
        $this->signIn(User::first());

        $this->assertAuthenticated();

        $this->get(
            route(
                'category.edit',
                Category::first(),
            )
        )
            ->assertOk();

        $this->post(
            route(
                'category.update',
                Category::first(),
            )
        )
            ->assertOk();
    }

    public function test_delete_category()
    {
        $this->signIn(User::first());

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
