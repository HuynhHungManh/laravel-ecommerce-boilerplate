<?php

namespace Arabia\Category\Database\Seeders;

use Illuminate\Database\Seeder;
use Arabia\Category\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' =>  'Root',
            'description' => 'This is the root category, don\'t delete this one',
            'parent_id' =>  null,
            'menu' =>  0,
            'slug' => '',
        ]);
    }
}
