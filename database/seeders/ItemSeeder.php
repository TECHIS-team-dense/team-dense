<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            [
                'id' => 1,
                'name' => 'アルファード',
                'type' =>'2',
                'price' =>'5000000',
                'detail' => '商品詳細、商品詳細、商品詳細、商品詳細、商品詳細、商品詳細',
                'secondary_category_id' =>1,
            ],

            [
                'id' => 2,
                'name' => 'きゅうり',
                'type' =>'2',
                'price' =>'1500',
                'detail' => '商品詳細、商品詳細、商品詳細、商品詳細、商品詳細、商品詳細',
                'secondary_category_id' => 1,
            ],

            [
                'id' => 3,
                'name' => 'りんご',
                'type' =>'1',
                'price' =>'3500',
                'detail' => '商品詳細、商品詳細、商品詳細、商品詳細、商品詳細、商品詳細',
                'secondary_category_id' => 1,
            ],

            [
                'id' => 4,
                'name' => 'バナナ',
                'type' =>'1',
                'price' =>'18000',
                'detail' => '商品詳細、商品詳細、商品詳細、商品詳細、商品詳細、商品詳細',
                'secondary_category_id' => 2,
            ],

            [
                'id' => 5,
                'name' => '白菜',
                'type' =>'2',
                'price' =>'3000',
                'detail' => '商品詳細、商品詳細、商品詳細、商品詳細、商品詳細、商品詳細',
                'secondary_category_id' => 2
            ],

            [
                'id' => 6,
                'name' => '牛肉',
                'type' =>'3',
                'price' =>'30000',
                'detail' => '商品詳細、商品詳細、商品詳細、商品詳細、商品詳細、商品詳細',
                'secondary_category_id' => 3,
            ],

            [
                'id' => 7,
                'name' => 'マスカット',
                'type' =>'1',
                'price' =>'12000',
                'detail' => '商品詳細、商品詳細、商品詳細、商品詳細、商品詳細、商品詳細',
                'secondary_category_id' => 3,
            ],

            [
                'id' => 8,
                'name' => 'ネギ',
                'type' =>'2',
                'price' =>'3000',
                'detail' => '商品詳細、商品詳細、商品詳細、商品詳細、商品詳細、商品詳細',
                'secondary_category_id' => 4,
            ],

            [
                'id' => 9,
                'name' => 'たまねぎ',
                'type' =>'2',
                'price' =>'5000',
                'detail' => '商品詳細、商品詳細、商品詳細、商品詳細、商品詳細、商品詳細',
                'secondary_category_id' => 4,
            ],

            [
                'id' => 10,
                'name' => '鶏肉',
                'type' =>'3',
                'price' =>'100000',
                'detail' => '商品詳細、商品詳細、商品詳細、商品詳細、商品詳細、商品詳細',
                'secondary_category_id' => 5,
            ],
        ]);
    }
}
