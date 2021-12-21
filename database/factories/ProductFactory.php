<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\Moderator;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->jobTitle,
            'price' => $this->faker->numberBetween(1000, 10000),
        ];
    }

    public function admin(): self
    {
        return $this->state(
            fn () => [
                'user_id' => Admin::first()->id,
            ],
        );
    }

    public function moderator(): self
    {
        return $this->state(
            fn () => [
                'user_id' => Moderator::first()->id,
            ],
        );
    }
}
