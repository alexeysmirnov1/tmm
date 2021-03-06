<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DefaultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            SettingsSeeder::class,
            CategoriesSeeder::class,
            LiabilitiesSeeder::class,
            ClientSeeder::class,
            PromotionSeeder::class,
            SourceSeeder::class,
            DebitSeeder::class,
        ]);
    }
}
