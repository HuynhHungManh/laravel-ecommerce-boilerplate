<?php

namespace Arabia\Category\Models;

use Illuminate\Database\Eloquent\Model;
use Arabia\Category\Contracts\CategoryContract;

class Category extends Model implements CategoryContract
{
    protected $fillable = ['name', 'slug', 'description', 'parent_id', 'featured', 'menu', 'image'];

    public function products()
    {
        return $this->belongsToMany('Arabia\Product\Models\Product', 'products_categories');
    }
}
