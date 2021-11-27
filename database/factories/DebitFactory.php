<?php

namespace Database\Factories;

use App\Models\Source;
use App\Models\User;
use App\Values\Status;
use Illuminate\Database\Eloquent\Factories\Factory;

class DebitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->jobTitle,
            'description' => $this->faker->realText,
            'date' => $this->faker->dateTimeBetween('2021-11-01', '2021-12-31'),
            'user_id' => User::first()->id,
            'source_id' => Source::first()->id,
            'status' => Status::CREATED,
        ];
    }
}
