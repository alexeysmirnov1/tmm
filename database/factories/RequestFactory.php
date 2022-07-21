<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->title,
            'description' => $this->faker->realText,
            'email' => $this->faker->email,
        ];
    }

    public function canceled(): self
    {
        return $this->state(
            fn () => [
                'status' => 'canceled',
            ],
        );
    }

    public function moderation(): self
    {
        return $this->state(
            fn () => [
                'status' => 'moderation',
            ],
        );
    }

    public function approved(): self
    {
        return $this->state(
            fn () => [
                'status' => 'approved',
            ],
        );
    }
}
