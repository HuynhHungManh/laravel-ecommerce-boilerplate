<?php

use Illuminate\Database\Seeder;
use Arabia\Category\Database\Seeders\CategoriesTableSeeder;
use Arabia\Product\Database\Seeders\ProductsTableSeeder;
use Arabia\Attribute\Database\Seeders\AttributesTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoriesTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(AttributesTableSeeder::class);
    }
}
