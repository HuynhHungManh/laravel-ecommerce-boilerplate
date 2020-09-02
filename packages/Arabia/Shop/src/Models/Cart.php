<?php

namespace Arabia\Shop\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'cart';

    protected $fillable = [
        'customer_email', 'customer_first_name', 'customer_last_name', 'shipping_method', 'coupon_code', 'items_qty', 'exchange_rate',
        'currency_code', 'grand_total', 'sub_total', 'tax_total', 'discount', 'checkout_method', 'customer_id', 'product_id',
    ];
}
