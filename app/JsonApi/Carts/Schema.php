<?php

namespace App\JsonApi\Carts;

use Neomerx\JsonApi\Schema\SchemaProvider;

class Schema extends SchemaProvider
{

    /**
     * @var string
     */
    protected $resourceType = 'carts';

    /**
     * @param \App\Cart $resource
     *      the domain record being serialized.
     * @return string
     */
    public function getId($resource)
    {
        return (string) $resource->getRouteKey();
    }

    /**
     * @param \App\Cart $resource
     *      the domain record being serialized.
     * @return array
     */
    public function getAttributes($resource)
    {
        return [
            'customer_email' => $resource->customer_email,
            'customer_first_name' => $resource->customer_first_name,
            'customer_last_name' => $resource->customer_last_name,
            'shipping_method' => $resource->shipping_method,
            'coupon_code' => $resource->coupon_code,
            'items_qty' => $resource->items_qty,
            'exchange_rate' => $resource->exchange_rate,
            'currency_code' => $resource->currency_code,
            'grand_total' => $resource->grand_total,
            'sub_total' => $resource->sub_total,
            'tax_total' => $resource->tax_total,
            'discount' => $resource->discount,
            'checkout_method' => $resource->checkout_method,
            'customer_id' => $resource->customer_id,
            'created-at' => $resource->created_at->toAtomString(),
            'updated-at' => $resource->updated_at->toAtomString(),
        ];
    }
}
