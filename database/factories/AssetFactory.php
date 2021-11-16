<?php

namespace Database\Factories;

use App\Models\Asset;
use App\Models\Source;
use Illuminate\Database\Eloquent\Factories\Factory;

class AssetFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Asset::class;

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
            'source_id' => Source::first(),
            'date' => $this->faker->date(),
        ];
    }
}
