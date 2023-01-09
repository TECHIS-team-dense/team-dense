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
                'price' =>'7752000',
                'detail' => 'ライブエッジの活版印刷の決まり文句。',
                'secondary_category_id' =>1,
            ],

            [
                'id' => 2,
                'name' => 'CX-5',
                'type' =>'2',
                'price' =>'2766500',
                'detail' => '商品詳細、商品詳細、商品詳細、商品詳細、商品詳細、商品詳細、商品詳細',
                'secondary_category_id' => 8,
            ],

            [
                'id' => 3,
                'name' => 'エクストレイル',
                'type' =>'1',
                'price' =>'3598000',
                'detail' => '商品詳細、商品詳細、商品詳細、商品詳細、商品詳細、商品詳細、商品詳細',
                'secondary_category_id' => 5,
            ],

            [
                'id' => 4,
                'name' => 'クラウン',
                'type' =>'1',
                'price' =>'6400000',
                'detail' => '商品詳細、商品詳細、商品詳細、商品詳細、商品詳細、商品詳細、商品詳細',
                'secondary_category_id' => 3,
            ],

            [
                'id' => 5,
                'name' => 'スカイライン',
                'type' =>'2',
                'price' =>'5569400',
                'detail' => '商品詳細、商品詳細、商品詳細、商品詳細、商品詳細、商品詳細',
                'secondary_category_id' => 6,
            ],

            [
                'id' => 6,
                'name' => 'セレナ',
                'type' =>'3',
                'price' =>'3730100',
                'detail' => '商品詳細、商品詳細、商品詳細、商品詳細、商品詳細、商品詳細',
                'secondary_category_id' => 4,
            ],

            [
                'id' => 7,
                'name' => 'CX-8',
                'type' =>'1',
                'price' =>'2994200',
                'detail' => '商品詳細、商品詳細、商品詳細、商品詳細、商品詳細、商品詳細',
                'secondary_category_id' => 8,
            ],

            [
                'id' => 8,
                'name' => 'プリウス',
                'type' =>'2',
                'price' =>'3640000',
                'detail' => '商品詳細、商品詳細、商品詳細、商品詳細、商品詳細、商品詳細',
                'secondary_category_id' => 3,
            ],

            [
                'id' => 9,
                'name' => 'ラウンドグルーザー',
                'type' =>'2',
                'price' =>'5543000',
                'detail' => '商品詳細、商品詳細、商品詳細、商品詳細、商品詳細、商品詳細',
                'secondary_category_id' => 2,
            ],

            [
                'id' => 10,
                'name' => 'ノア',
                'type' =>'3',
                'price' =>'3890000',
                'detail' => '商品詳細、商品詳細、商品詳細、商品詳細、商品詳細、商品詳細',
                'secondary_category_id' => 1,
            ],

            [
                'id' => 11,
                'name' => 'MAZDA6 SEDAN',
                'type' =>'3',
                'price' =>'2962300',
                'detail' => '商品詳細、商品詳細、商品詳細、商品詳細、商品詳細、商品詳細',
                'secondary_category_id' => 9,
            ],

            [
                'id' => 12,
                'name' => 'キャラバン',
                'type' =>'3',
                'price' =>'3420000',
                'detail' => '商品詳細、商品詳細、商品詳細、商品詳細、商品詳細、商品詳細',
                'secondary_category_id' => 4,
            ],

            [
                'id' => 13,
                'name' => 'CX-30',
                'type' =>'3',
                'price' =>'2840000',
                'detail' => 'ライブエッジの活版印刷の決まり文句。',
                'secondary_category_id' => 8,
            ],

            [
                'id' => 14,
                'name' => 'MX-30',
                'type' =>'3',
                'price' =>'2980000',
                'detail' => '商品詳細、商品詳細、商品詳細、商品詳細、商品詳細、商品詳細',
                'secondary_category_id' => 8,
            ],

            [
                'id' => 15,
                'name' => 'センチュリー',
                'type' =>'3',
                'price' =>'20080000',
                'detail' => '商品詳細、商品詳細、商品詳細、商品詳細、商品詳細、商品詳細',
                'secondary_category_id' => 3,
            ],
        ]);
    }
}
