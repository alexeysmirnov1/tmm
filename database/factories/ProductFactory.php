<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\Moderator;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->title,
            'price' => $this->faker->numberBetween(100, 3000),
        ];
    }

    public function admin(): self
    {
        return $this->state(
            fn () => [
                'user_id' => Admin::first()->id
            ],
        );
    }

    public function moderator(): self
    {
        return $this->state(
            fn () => [
                'user_id' => Moderator::first()->id
            ],
        );
    }
}
