<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        DB::table('category')->insert([
            'id'           => 1,
            'name'              => 'Hoa sinh nhật',
            'description' => 'Hoa sinh nhật'
        ]);

        DB::table('category')->insert([
            'id'           => 2,
            'name'              => 'Hoa khai trương',
            'description' => 'Hoa khai trương'

        ]);

        DB::table('category')->insert([
            'id'           => 3,
            'name'              => 'Hoa chúc mừng',
            'description' => 'Hoa chúc mừng'

        ]);

        DB::table('category')->insert([
            'id'           => 4,
            'name'              => 'Hoa chia buồn',
            'description' => 'Hoa chia buồn'

        ]);

        DB::table('category')->insert([
            'id'           => 5,
            'name'              => 'Hoa chúc sức khoẻ',
            'description' => 'Hoa chúc sức khoẻ'

        ]);
        DB::table('category')->insert([
            'id'           => 6,
            'name'              => 'Hoa tình yêu',
            'description' => 'Hoa tình yêu'

        ]);
        DB::table('category')->insert([
            'id'           => 7,
            'name'              => 'Hoa cảm ơn',
            'description' => 'Hoa cảm ơn'

        ]);
        DB::table('category')->insert([
            'id'           => 8,
            'name'              => 'Hoa mừng tốt nghiệp',
            'description' => 'Hoa mừng tốt nghiệp'

        ]);
        DB::table('category')->insert([
            'id'           => 9,
            'name'              => 'Hoa tặng người yêu',
            'description' => 'Hoa tặng người yêu'

        ]);
    }
}
