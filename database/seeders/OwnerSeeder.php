<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('owners')->insert([
            [
                'id' => '1',
                'name' => '鶴太郎',
                'email' => 'turu050505@gmail.com',
                'password' => Hash::make('password123'),
            ],
        ]);
    }
}
