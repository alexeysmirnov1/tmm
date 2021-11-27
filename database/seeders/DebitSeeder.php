<?php

namespace Database\Seeders;

use App\Models\Debit;
use Illuminate\Database\Seeder;

class DebitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Debit::factory()->count(5)->create();
    }
}
