<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use DatabaseTransactions;

    public function setUp(): void
    {
        parent::setUp();
    }

    public function test_guest_can_not_get_categories()
    {
        $this->assertGuest();

        $this->get(route('categories.index'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function test_user_can_get_categories()
    {
        $this->signIn(User::first());

        $this->assertAuthenticated();

        $this->get(route('categories.index'))
            ->assertOk();
    }

    public function test_get_one_category()
    {
        $this->signIn(User::first());

        $this->assertAuthenticated();

        $this->get(
            route(
                'categories.show',
                Category::first(),
            )
        )
            ->assertOk();
    }

    public function test_create_category()
    {
        $this->signIn(User::first());

        $this->assertAuthenticated();

        $this->get(route('categories.create'))
            ->assertOk();

        $this->post(route('categories.store'))
            ->assertOk();
    }

    public function test_update_category()
    {
        $this->signIn(User::first());

        $this->assertAuthenticated();

        $this->get(
            route(
                'categories.edit',
                Category::first(),
            )
        )
            ->assertOk();

        $this->post(
            route(
                'categories.update',
                Category::first(),
            )
        )
            ->assertStatus(301)
            ->assertRedirect(route('dashboard'));
    }

    public function test_delete_category()
    {
        $this->signIn(User::first());

        $this->assertAuthenticated();

        $this->get(
            route(
                'categories.destroy',
                Category::first(),
            )
        )
            ->assertOk();
    }
}
