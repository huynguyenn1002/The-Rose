<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('province')->insert([
            'province_id'           => 10,
            'name'              => 'Hai Bà Trưng',
            'city_id'     => 1,
        ]);

        DB::table('province')->insert([
            'province_id'           => 11,
            'name'              => 'Hoàng Mai',
            'city_id'     => 1,
        ]);

        DB::table('province')->insert([
            'province_id'           => 12,
            'name'              => 'Hoàn Kiếm',
            'city_id'     => 1,
        ]);

        DB::table('province')->insert([
            'province_id'           => 13,
            'name'              => 'An Dương',
            'city_id'     => 2,
        ]);

        DB::table('province')->insert([
            'province_id'           => 14,
            'name'              => 'An Lão',
            'city_id'     => 2,
        ]);
        DB::table('province')->insert([
            'province_id'           => 15,
            'name'              => 'Thành phố Hưng Yên',
            'city_id'     => 3,
        ]);
        DB::table('province')->insert([
            'province_id'           => 16,
            'name'              => 'Thị xã Mỹ hào',
            'city_id'     => 3,
        ]);
        DB::table('province')->insert([
            'province_id'           => 17,
            'name'              => 'Thanh Hà',
            'city_id'     => 4,
        ]);
        DB::table('province')->insert([
            'province_id'           => 18,
            'name'              => 'Thanh Miện',
            'city_id'     => 4,
        ]);
    }
}
