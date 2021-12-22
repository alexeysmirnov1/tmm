<?php

namespace Database\Seeders;

use App\Models\Attribute;
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
    }
}
