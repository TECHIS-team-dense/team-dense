<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('primary_categories')->insert([
            [
                'name' => 'トヨタ',
                'sort_order' => 1,
            ],

            [
                'name' => '日産',
                'sort_order' => 2,
            ],

            [
                'name' => 'マツダ',
                'sort_order' => 3,
            ],

        ]);

        //DB::table('secondary_categories')->insert([
            //[
                'name' => 'ミニバン',
                'sort_order' => 1,
                'primary_category_id' => 1
            ],

            [
                'name' => 'SUV',
                'sort_order' => 2,
                'primary_category_id' => 1
            ],

            [
                'name' => 'セダン',
                'sort_order' => 3,
                'primary_category_id' => 1
            ],

            [
                'name' => 'ミニバン',
                'sort_order' => 4,
                'primary_category_id' => 2
            ],

            [
                'name' => 'SUV',
                'sort_order' => 5,
                'primary_category_id' => 2
            ],

            [
                'name' => 'セダン',
                'sort_order' => 6,
                'primary_category_id' => 2
            ],

            [
                'name' => 'ミニバン',
                'sort_order' => 7,
                'primary_category_id' => 3
            ],

            [
                'name' => 'SUV',
                'sort_order' => 8,
                'primary_category_id' => 3
            ],

            [
                'name' => 'セダン',
                'sort_order' => 9,
                'primary_category_id' => 3
            ],


        ]);
    }
}
