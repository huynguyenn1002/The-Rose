<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('city')->insert([
            'city_id'         => 1,
            'name'                  => 'Hà Nội',
        ]);
        DB::table('city')->insert([
            'city_id'         => 2,
            'name'                  => 'Hải Phòng',
        ]);
        DB::table('city')->insert([
            'city_id'         => 3,
            'name'                  => 'Hưng Yên',
        ]);
        DB::table('city')->insert([
            'city_id'         => 4,
            'name'                  => 'Hải Dương',
        ]);
    }
}
