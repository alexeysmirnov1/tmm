<?php

namespace Database\Seeders;

use App\Models\Attribute;
use App\Models\Product;
use Illuminate\Database\Seeder;

class AttributeSeeder extends Seeder
{
    public function run(): void
    {
        $attributes = [
            ['title' => 'Объём, ГБ', 'type' => 'string'],
            ['title' => 'Макс. Скорость записи, Мб/с', 'type' => 'string'],
            ['title' => 'Макс. Скорость чтения, Мб/с', 'type' => 'string'],

            ['title' => 'Год выпуска', 'type' => 'string'],
            ['title' => 'Суммарный объем памяти', 'type' => 'string'],
            ['title' => 'Емкость одного модуля', 'type' => 'string'],
            ['title' => 'Тип памяти', 'type' => 'string'],
            ['title' => 'Тактовая частота, МГц', 'type' => 'number'],

            ['title' => 'Диагональ экрана', 'type' => 'string'],
            ['title' => 'Технология матрицы', 'type' => 'string'],
            ['title' => 'Оперативная память', 'type' => 'string'],
            ['title' => 'Общий объем SSD, ГБ', 'type' => 'string'],
            ['title' => 'Время автономной работы, ч', 'type' => 'string'],
            ['title' => 'Процессор', 'type' => 'string'],
        ];

        foreach ($attributes as $attribute) {
            Attribute::updateOrCreate($attribute);
        }

        Product::find(1)
            ->attributes()
            ->sync([
                1 => ['value' => 480],
                2 => ['value' => 450],
                3 => ['value' => 520],
            ]);

        Product::find(2)
            ->attributes()
            ->sync([
                4 => ['value' => 2019],
                5 => ['value' => 16],
                6 => ['value' => 8],
                7 => ['value' => 'DDR4'],
                8 => ['value' => 2666],
            ]);

        Product::find(3)
            ->attributes()
            ->sync([
                9 => ['value' => 13],
                10 => ['value' => 'RETINA'],
                11 => ['value' => '8 ГБ'],
                12 => ['value' => 512],
                13 => ['value' => 20],
                14 => ['value' => 'Apple M1'],
            ]);
    }
}
