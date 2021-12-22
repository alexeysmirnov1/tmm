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
            CategoriesSeeder::class,
            ProductSeeder::class,
            AttributeSeeder::class,
            ProductAttributeSeeder::class,
        ]);
    }
}
