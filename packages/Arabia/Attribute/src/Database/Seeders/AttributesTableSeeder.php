<?php

namespace Arabia\Attribute\Database\Seeders;

use Illuminate\Database\Seeder;
use Arabia\Attribute\Models\Attribute;
use Arabia\Attribute\Models\AttributeFamily;

class AttributesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Attribute::create([
            'code' => 'color',
            'name' => 'Color',
            'frontend_type' =>  'text',
            'is_filterable' =>  true,
            'is_required' => true,
        ]);

        Attribute::create([
            'code' => 'size',
            'name' => 'Size',
            'frontend_type' =>  'text',
            'is_filterable' =>  true,
            'is_required' => true,
        ]);

        AttributeFamily::create([
            'code' => 'size',
            'name' => 'Size',
            'status' =>  true,
            'is_user_defined' =>  true,
        ]);
    }
}
