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
            
