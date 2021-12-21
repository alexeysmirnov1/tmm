<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::factory()
            ->admin()
            ->count(10)
            ->create();

        Product::factory()
            ->moderator()
            ->count(10)
            ->create();
    }
}
