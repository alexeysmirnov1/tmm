<?php

namespace Database\Seeders;

use App\Models\Attribute;
use App\Models\AttributeType;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AttributeSeeder extends Seeder
{
    public function run(): void
    {
        $attributeTypes = [
            [
                'type' => ['title' => 'Основные', 'description' => 'SSD', 'type' => ''],
                'attributes' => [
                    ['title' => 'Форм-фактор', 'value' => '2.5"'],
                    ['title' => 'Объем', 'value' => '480 ГБ'],
                    ['title' => 'Бренд', 'value' => 'Kingston'],
                    ['title' => 'Макс. Скорость записи, Мб/с', 'value' => '450'],
                    ['title' => 'Назначение', 'value' => 'Для настольного компьютера'],
                    ['title' => 'Назначение', 'value' => '500'],
                ],
            ],
            [
                'type' => ['title' => 'Дополнительные', 'description' => 'SSD', 'type' => ''],
                'attributes' => [
                    ['title' => 'Интерфейс SSD', 'value' => 'SATA3 6.0 Гбит/с'],
                    ['title' => 'Страна-изготовитель', 'value' => 'Китай (Тайвань)'],
                    ['title' => 'Тип жесткого диска', 'value' => 'SSD'],
                    ['title' => 'Тип', 'value' => 'Внутренний SSD диск'],
                ],
            ],
        ];

//        $this->createAttributes(Product::find(1), $attributeTypes);

        $attributeTypes = [
            [
                'type' => ['title' => 'Заводские данные', 'description' => 'RAM', 'type' => ''],
                'attributes' => [
                    ['title' => 'Пропускная способность, Мб/с', 'value' => '25600'],
                    ['title' => 'Тайминги', 'value' => '16-18-18-32'],
                ],
            ],
            [
                'type' => ['title' => 'Основные', 'description' => 'RAM', 'type' => ''],
                'attributes' => [
                    ['title' => 'Суммарный объем памяти', 'value' => '16 ГБ'],
                    ['title' => 'Емкость одного модуля', 'value' => '8 ГБ'],
                    ['title' => 'Тип памяти', 'value' => 'DDR4'],
                    ['title' => 'Тактовая частота, МГц', 'value' => '3200'],
                    ['title' => 'Количество модулей в комплекте', 'value' => '2'],
                ],
            ],
            [
                'type' => ['title' => 'Дополнительные', 'description' => 'RAM', 'type' => ''],
                'attributes' => [
                    ['title' => 'Форм-фактор RAM', 'value' => 'DIMM'],
                ],
            ],
        ];

//        $this->createAttributes(Product::find(2), $attributeTypes);

        $attributeTypes = [
            [
                'type' => ['title' => 'Экран', 'description' => 'Laptop', 'type' => ''],
                'attributes' => [
                    ['title' => 'Диагональ экрана, дюймы', 'value' => '13.3'],
                    ['title' => 'Технология матрицы', 'value' => 'RETINA'],
                    ['title' => 'Разрешение экрана', 'value' => '2560x1600'],
                ],
            ],
            [
                'type' => ['title' => 'Оперативная память', 'description' => 'Laptop', 'type' => ''],
                'attributes' => [
                    ['title' => 'Оперативная память', 'value' => '8 ГБ'],
                    ['title' => 'Тип памяти', 'value' => 'DDR4'],
                    ['title' => 'Возможность расширения RAM, до', 'value' => '8 ГБ'],
                ],
            ],
            [
                'type' => ['title' => 'Процессор', 'description' => 'Laptop', 'type' => ''],
                'attributes' => [
                    ['title' => 'Процессор', 'value' => 'Apple M1 (3.2 ГГц)'],
                    ['title' => 'Число ядер процессора', 'value' => '8'],
                    ['title' => 'Частота процессора, ГГц', 'value' => '3.2'],
                    ['title' => 'Бренд процессора', 'value' => 'Apple'],
                    ['title' => 'Модель процессора', 'value' => 'Apple M1'],
                ],
            ],
            [
                'type' => ['title' => 'Корпус', 'description' => 'Laptop', 'type' => ''],
                'attributes' => [
                    ['title' => 'Вес, кг', 'value' => '1.4'],
                    ['title' => 'Материал корпуса', 'value' => 'Алюминий'],
                    ['title' => 'Цвет клавиатуры', 'value' => 'серебристый'],
                    ['title' => 'Покрытие корпуса', 'value' => 'Алюминиевое'],
                    ['title' => 'Форм-фактор ноутбука', 'value' => 'Ультрабук'],
                    ['title' => 'Подсветка клавиатуры', 'value' => 'Да'],
                    ['title' => 'Вес товара, г', 'value' => '1400'],
                ],
            ],
        ];

//        $this->createAttributes(Product::find(3), $attributeTypes);

        $attributeTypes = [
            [
                'type' => ['title' => 'Видеокарта', 'description' => 'Laptop', 'type' => ''],
                'attributes' => [
                    ['title' => 'Видеокарта', 'value' => 'NVIDIA GeForce MX350 (2 ГБ)'],
                    ['title' => 'Видеопамять', 'value' => '2 ГБ'],
                    ['title' => 'Тип видеокарты', 'value' => 'Дискретная'],
                ],
            ],
            [
                'type' => ['title' => 'Экран', 'description' => 'Laptop', 'type' => ''],
                'attributes' => [
                    ['title' => 'Диагональ экрана, дюймы', 'value' => '15.6'],
                    ['title' => 'Технология матрицы', 'value' => 'WVA'],
                    ['title' => 'Разрешение экрана', 'value' => '1920x1080'],
                    ['title' => 'Макс. частота обновления, Гц', 'value' => '60'],
                ],
            ],
            [
                'type' => ['title' => 'Оперативная память', 'description' => 'Laptop', 'type' => ''],
                'attributes' => [
                    ['title' => 'Оперативная память', 'value' => '8 ГБ'],
                    ['title' => 'Тип памяти', 'value' => 'DDR4'],
                    ['title' => 'Форм-фактор RAM', 'value' => 'SO-DIMM'],
                ],
            ],
            [
                'type' => ['title' => 'Процессор', 'description' => 'Laptop', 'type' => ''],
                'attributes' => [
                    ['title' => 'Процессор', 'value' => 'Intel Core i5-1135G7 (2.4 ГГц)'],
                    ['title' => 'Число ядер процессора', 'value' => '4'],
                    ['title' => 'Частота процессора, ГГц', 'value' => '2.4'],
                    ['title' => 'Бренд процессора', 'value' => 'Intel'],
                    ['title' => 'Модель процессора', 'value' => 'Intel Core i5'],
                ],
            ],
        ];

//        $this->createAttributes(Product::find(4), $attributeTypes);

        //testing dataset
        $types = AttributeType::factory()
            ->count(rand(3, 44))
            ->create();

        $attributes = Attribute::all();
        foreach ($types as $type) {
            $attrs = Attribute::factory()
                ->count(rand(1, 16))
                ->create([
                    'attribute_type_id' => $type->id,
                ]);

            $attributes->push(...$attrs);
        }

//        Product::where('id', '>', 4)->get();
        Product::factory()
            ->admin()
            ->count(20000)
            ->create()
            ->each(function ($product) use ($attributes) {
                $countAttributes = rand(5, 30);
                $attach = array_combine(
                    $attributes->random($countAttributes)->pluck('id')->toArray(),
                    $this->generateValues($countAttributes),
                );

                $product->attributes()
                    ->attach($attach);
            });
    }

    private function createAttributes(Product $product, array $attributeTypes)
    {
        $product->attributes()
            ->detach();

        foreach ($attributeTypes as $attributeType) {
            $type = AttributeType::firstOrCreate($attributeType['type']);
            $attributes = [];

            foreach($attributeType['attributes'] as $attribute) {
                $attr = Attribute::firstOrCreate([
                    'title' => $attribute['title'],
                    'attribute_type_id' => $type->id,
                ]);

                $attributes[$attr->id] = ['value' => $attribute['value']];
            }

            $product->attributes()
                ->attach($attributes);
        }
    }

    private function generateValues(int $count): array
    {
        $result = [];

        foreach (range(1, $count) as $key) {
            $result[] = ['value' => Str::random(rand(6, 30))];
        }

        return $result;
    }
}
