<?php

namespace Database\Seeders;

use App\Models\Asset;
use Illuminate\Database\Seeder;

class AssetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Asset::factory()->create([
            'date' => '2021-10-27 11:00:00',
        ]);

        Asset::factory()->count(5)->create();
    }
}
