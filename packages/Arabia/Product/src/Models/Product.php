<?php

namespace Arabia\Product\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'brand_id', 'sku', 'name', 'slug', 'description', 'quantity',
        'weight', 'price', 'sale_price', 'status', 'featured', 'attribute_family_id',
    ];

    public function categories()
    {
        return $this->belongsToMany('Arabia\Category\Models\Category', 'products_categories');
    }

    public function attributeValues()
    {
        return $this->hasMany('Arabia\Attribute\Models\AttributeValue');
    }

    public function attributeFamily()
    {
        return $this->belongsTo('Arabia\Attribute\Models\AttributeFamily');
    }
}
