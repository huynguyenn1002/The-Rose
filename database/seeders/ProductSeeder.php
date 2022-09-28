<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'id'           => 1,
            'category_id'           => 1,
            'product_name'              => 'Hoa cúc hoạ mi',
            'price'              => '100000',
            'discount'              => '10',
            'type'              => 0,
            'view'              => '5',
            'description' => 'Hoa cúc hoạ mi'
        ]);

        Product::create([
            'id'           => 2,
            'category_id'           => 2,
            'product_name'              => 'Hoa hồng',
            'price'              => '100000',
            'discount'              => '10',
            'type'              => 1,
            'view'              => '6',
            'description' => 'Hoa hồng'
        ]);

        Product::create([
            'id'           => 3,
            'category_id'           => 3,
            'product_name'              => 'Hoa ly',
            'price'              => '100000',
            'discount'              => '10',
            'type'              => 3,
            'view'              => '7',
            'description' => 'Hoa ly'
        ]);

        Product::create([
            'id'           => 4,
            'category_id'           => 4,
            'product_name'              => 'Hoa hướng dương',
            'price'              => '100000',
            'discount'              => '10',
            'type'              => 2,
            'view'              => '8',
            'description' => 'Hoa hướng dương'
        ]);

        Product::create([
            'id'           => 5,
            'category_id'           => 5,
            'product_name'              => 'Hoa dơn',
            'price'              => '100000',
            'discount'              => '10',
            'type'              => 4,
            'view'              => '9',
            'description' => 'Hoa dơn'
        ]);

        Product::create([
            'id'           => 6,
            'category_id'           => 6,
            'product_name'              => 'Hoa huệ',
            'price'              => '100000',
            'discount'              => '10',
            'type'              => 1,
            'view'              => '100',
            'description' => 'Hoa huệ'
        ]);

        Product::create([
            'id'           => 7,
            'category_id'           => 7,
            'product_name'              => 'Hoa thược dược',
            'price'              => '100000',
            'discount'              => '10',
            'type'              => 2,
            'view'              => '11',
            'description' => 'Hoa thược dược'
        ]);

        Product::create([
            'id'           => 8,
            'category_id'           => 8,
            'product_name'              => 'Hoa cẩm chướng',
            'price'              => '100000',
            'discount'              => '10',
            'type'              => 3,
            'view'              => '10',
            'description' => 'Hoa cẩm chướng'
        ]);

        Product::create([
            'id'           => 9,
            'category_id'           => 8,
            'product_name'              => 'Hoa lan',
            'price'              => '100000',
            'discount'              => '10',
            'type'              => 1,
            'view'              => '10',
            'description' => 'Hoa lan'
        ]);

        Product::create([
            'id'           => 10,
            'category_id'           => 8,
            'product_name'              => 'Hoa đào',
            'price'              => '100000',
            'discount'              => '15',
            'type'              => 4,
            'view'              => '10',
            'description' => 'Hoa đào'
        ]);

    }
}
