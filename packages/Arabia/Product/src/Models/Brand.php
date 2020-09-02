<?php

namespace Arabia\Product\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['name', 'slug', 'logo'];

    public function product()
    {
        return $this->belongsTo('Arabia\Category\Models\Category');
    }
}
