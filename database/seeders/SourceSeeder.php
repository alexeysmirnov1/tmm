<?php

namespace Database\Seeders;

use App\Models\Source;
use Illuminate\Database\Seeder;

class SourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Source::factory()->create([
            'title' => '1d',
            'color' => '#f45',
            'time' => '02:00:00',
        ]);

        Source::factory()->count(5)->create();
    }
}
