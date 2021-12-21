<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            SettingsSeeder::class,
            ProductSeeder::class
//            CategoriesSeeder::class,
//            LiabilitiesSeeder::class,
//            ClientSeeder::class,
//            PromotionSeeder::class,
//            SourceSeeder::class,
//            AssetsSeeder::class,
        ]);
    }
}
