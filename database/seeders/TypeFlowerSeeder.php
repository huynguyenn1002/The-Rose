<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeFlowerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_products')->insert([
            'id'           => 1,
            'type_name'              => 'Bó hoa',
        ]);

        DB::table('type_products')->insert([
            'id'           => 2,
            'type_name'              => 'Giỏ hoa',
        ]);

        DB::table('type_products')->insert([
            'id'           => 3,
            'type_name'              => 'Lãng hoa',
        ]);

        DB::table('type_products')->insert([
            'id'           => 4,
            'type_name'              => 'Chậu hoa',
        ]);

        DB::table('type_products')->insert([
            'id'           => 5,
            'type_name'              => 'Kệ hoa (Hoa chào mừng)',
        ]);
    }
}
