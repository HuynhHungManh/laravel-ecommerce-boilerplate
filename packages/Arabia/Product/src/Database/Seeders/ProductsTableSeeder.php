<?php

namespace Arabia\Product\Database\Seeders;

use Illuminate\Database\Seeder;
use Arabia\Product\Models\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'brand_id' => '1',
            'sku' => '1',
            'name' =>  'product 1',
            'slug' =>  'product-1',
            'description' => 'test',
            'quantity' => '1',
            'weight' => 1,
            'price' => '12',
            'sale_price' => '12',
            'status' => 0,
            'featured' => 0,
        ]);

        Product::create([
            'brand_id' => '1',
            'sku' => '1',
            'name' =>  'product 2',
            'slug' =>  'product-2',
            'description' => 'test 2',
            'quantity' => '1',
            'weight' => 1,
            'price' => '15',
            'sale_price' => '15',
            'status' => 1,
            'featured' => 0,
        ]);
    }
}
