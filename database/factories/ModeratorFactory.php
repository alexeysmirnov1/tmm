<?php

namespace Database\Factories;

use App\Models\Moderator;
use Illuminate\Database\Eloquent\Factories\Factory;

class ModeratorFactory extends Factory
{
    protected $model = Moderator::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
        ];
    }
}
