<?php

namespace Arabia\Shop\Models;

use Illuminate\Database\Eloquent\Model;
use Arabia\Product\Models\Product;

class OrderItem extends Model
{
    protected $table = 'order_items';

    protected $fillable = [
        'order_id', 'product_id', 'quantity', 'price'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
