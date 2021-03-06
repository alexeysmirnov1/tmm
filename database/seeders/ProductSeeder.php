<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            ['title' => '480 ГБ Внутренний SSD диск Kingston'],
            ['title' => 'Оперативная память HyperX 2x8 ГБ DDR4'],
            ['title' => '13.3" Ноутбук Apple MacBook Pro'],
            ['title' => '15.6" Игровой ноутбук Dell'],
        ];

        foreach ($products as $product) {
            Product::factory()
                ->moderator()
                ->create($product)
                ->categories()
                ->sync(Category::whereSlug(Category::SLUG_ELECTRONICS)->first());
        }

//        Product::factory()
//            ->admin()
//            ->count(500)
//            ->create();
    }
}
