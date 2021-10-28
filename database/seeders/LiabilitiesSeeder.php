<?php

namespace Database\Seeders;

use App\Models\Liability;
use Illuminate\Database\Seeder;

class LiabilitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Liability::factory()->count(5)->create();
    }
}
