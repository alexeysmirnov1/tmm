<?php

namespace Database\Factories;

use App\Models\Liability;
use Illuminate\Database\Eloquent\Factories\Factory;

class LiabilityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Liability::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->title,
            'description' => $this->faker->text,
        ];
    }
}
