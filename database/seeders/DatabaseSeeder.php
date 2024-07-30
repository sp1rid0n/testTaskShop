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
        // User::factory(10)->create();
        DB::table('categories')->insert([
            ['parent_id' => null, 'name' => 'Смартфоны'],
            ['parent_id' => null, 'name' => 'Гаджеты'],
            ['parent_id' => null, 'name' => 'Фототехника'],
            ['parent_id' => 2, 'name' => 'Часы'],
            ['parent_id' => 2, 'name' => 'Наушники и гарнитуры'],
            ['parent_id' => 5, 'name' => 'Наушники TWS'],
            ['parent_id' => 5, 'name' => 'Игровые наушники'],
            ['parent_id' => 5, 'name' => 'Наушники-вкладыши'],
            ['parent_id' => 4, 'name' => 'Смарт-часы'],
            ['parent_id' => 4, 'name' => 'Фитнес-браслеты'],
            ['parent_id' => 4, 'name' => 'Детские часы'],
            ['parent_id' => 3, 'name' => 'Фотоаппараты'],
            ['parent_id' => 12, 'name' => 'Зеркальные фотоаппараты'],
            ['parent_id' => 12, 'name' => 'Компактные фотоаппараты'],
            ['parent_id' => 3, 'name' => 'Экшн-камеры'],
            ['parent_id' => 15, 'name' => 'Экшн-камеры'],
            ['parent_id' => 15, 'name' => 'Аксессуары экшн-камер'],

        ]);

        DB::table('products')->insert([
            ['category_id' => 1, 'name' => 'Samsung Galaxy A05', 'price' => 10999],
            ['category_id' => 1, 'name' => 'Xiaomi Redmi 13C', 'price' => 13999],
            ['category_id' => 1, 'name' => 'Apple iPhone 12 mini', 'price' => 49999],
            ['category_id' => 6, 'name' => 'Apple AirPods Pro 2', 'price' => 26999],
            ['category_id' => 6, 'name' => 'HUAWEI Freebuds 5i', 'price' => 4599],
            ['category_id' => 7, 'name' => 'Fifine H6', 'price' => 3299],
            ['category_id' => 8, 'name' => 'Ritmix RH-010', 'price' => 490],
            ['category_id' => 9, 'name' => 'HUAWEI WATCH GT 4', 'price' => 15999],
            ['category_id' => 9, 'name' => 'Apple Watch SE 2023', 'price' => 29999],
            ['category_id' => 10, 'name' => 'HUAWEI Band 8', 'price' => 2999],
            ['category_id' => 11, 'name' => 'HUAWEI Watch Kids 4', 'price' => 9999],
            ['category_id' => 13, 'name' => 'Canon EOS 2000D', 'price' => 49999],
            ['category_id' => 13, 'name' => 'Nikon D3500', 'price' => 80999],
            ['category_id' => 14, 'name' => 'DEXP Kids Cam Kitty', 'price' => 850],
            ['category_id' => 16, 'name' => 'Aceline S-60', 'price' => 3699],
            ['category_id' => 16, 'name' => 'SJCAM SJ4000', 'price' => 4999],
            ['category_id' => 17, 'name' => 'Штатив DEXP MT-30', 'price' => 140],
            ['category_id' => 17, 'name' => 'Стабилизатор Moza AirCross S', 'price' => 32499],
            ['category_id' => 17, 'name' => 'Крепление-переходник DEXP X66', 'price' => 40],
        ]);

        DB::table('purchases')->insert([
            ['product_id' => 1, 'count' => 2, 'purchase_date' => now()],
            ['product_id' => 2, 'count' => 1, 'purchase_date' => now()],
            ['product_id' => 3, 'count' => 8, 'purchase_date' => now()],
        ]);
    }
}
