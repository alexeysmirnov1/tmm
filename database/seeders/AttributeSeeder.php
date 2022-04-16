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
            ['title' => 'Объём, ГБ'],
            ['title' => 'Макс. Скорость записи, Мб/с'],
            ['title' => 'Макс. Скорость чтения, Мб/с'],

            ['title' => 'Год выпуска'],
            ['title' => 'Суммарный объем памяти'],
            ['title' => 'Емкость одного модуля'],
            ['title' => 'Тип памяти'],
            ['title' => 'Тактовая частота, МГц'],

            ['title' => 'Диагональ экрана'],
            ['title' => 'Технология матрицы'],
            ['title' => 'Оперативная память'],
            ['title' => 'Общий объем SSD, ГБ'],
            ['title' => 'Время автономной работы, ч'],
            ['title' => 'Процессор'],
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
