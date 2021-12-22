<?php

namespace Database\Seeders;

use App\Models\ProductAttribute;
use Illuminate\Database\Seeder;

class ProductAttributeSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'product_id' => 1,
                'attribute_id' => 1,
                'value' => 480,
            ],
            [
                'product_id' => 1,
                'attribute_id' => 2,
                'value' => 450,
            ],
            [
                'product_id' => 1,
                'attribute_id' => 3,
                'value' => 520,
            ],

            [
                'product_id' => 2,
                'attribute_id' => 4,
                'value' => 2019,
            ],
            [
                'product_id' => 2,
                'attribute_id' => 5,
                'value' => 16,
            ],
            [
                'product_id' => 2,
                'attribute_id' => 6,
                'value' => 8,
            ],
            [
                'product_id' => 2,
                'attribute_id' => 7,
                'value' => 'DDR4',
            ],
            [
                'product_id' => 2,
                'attribute_id' => 8,
                'value' => 2666,
            ],

            [
                'product_id' => 3,
                'attribute_id' => 9,
                'value' => 13,
            ],
            [
                'product_id' => 3,
                'attribute_id' => 10,
                'value' => 'RETINA',
            ],
            [
                'product_id' => 3,
                'attribute_id' => 11,
                'value' => '8 ГБ',
            ],
            [
                'product_id' => 3,
                'attribute_id' => 12,
                'value' => 512,
            ],
            [
                'product_id' => 3,
                'attribute_id' => 13,
                'value' => 20,
            ],
            [
                'product_id' => 3,
                'attribute_id' => 14,
                'value' => 'Apple M1',
            ],
        ];

        foreach ($data as $attributes) {
            ProductAttribute::create($attributes);
        }
    }
}
