<?php

namespace Arabia\Shop\Database\Seeders;

use Illuminate\Database\Seeder;
use Arabia\Shop\Models\Cart;

class CartsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cart::create([
            'name' =>  'Root',
            'description' => 'This is the root category, don\'t delete this one',
            'parent_id' => null,
            'menu' => 0,
            'slug' => '',
        ]);
    }
}
