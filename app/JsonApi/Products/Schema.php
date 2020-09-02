<?php

namespace App\JsonApi\Products;

use Neomerx\JsonApi\Schema\SchemaProvider;

class Schema extends SchemaProvider
{

    /**
     * @var string
     */
    protected $resourceType = 'products';

    protected $relationships = [
        'categories',
        'attributeFamily',
        'attributeValues'
    ];

    /**
     * @param \App\Product $resource
     *      the domain record being serialized.
     * @return string
     */
    public function getId($resource)
    {
        return (string) $resource->getRouteKey();
    }

    /**
     * @param \App\Product $resource
     *      the domain record being serialized.
     * @return array
     */
    public function getAttributes($resource)
    {
        return [
            'brand_id' => $resource->brand_id,
            'sku' => $resource->sku,
            'name' => $resource->name,
            'slug' => $resource->slug,
            'description' => $resource->description,
            'quantity' => $resource->quantity,
            'weight' => $resource->weight,
            'price' => $resource->price,
            'sale_price' => $resource->sale_price,
            'status' => $resource->status,
            'featured' => $resource->featured,
            'attribute_family_id' => $resource->attribute_family_id,
            'attributes' => $resource->attributes,
            'created-at' => $resource->created_at->toAtomString(),
            'updated-at' => $resource->updated_at->toAtomString(),
        ];
    }

    public function getRelationships($resource, $isPrimary, array $includeRelationships)
    {
        return [
            'categories' => [
                self::SHOW_SELF => true,
                self::SHOW_RELATED => true,
                self::SHOW_DATA => isset($includeRelationships['categories']),
                self::DATA => function () use ($resource) {
                    return $resource->categories;
                },
                self::META => function () use ($resource) {
                    return [
                        'total' => $resource->categories->count(),
                    ];
                },
            ],
            'attributeFamily' => [
                self::SHOW_SELF => true,
                self::SHOW_RELATED => true,
                self::SHOW_DATA => isset($includeRelationships['attributeFamily']),
                self::DATA => function () use ($resource) {
                    return $resource->attributeFamily;
                },
            ],
            'attributeValues' => [
                self::SHOW_SELF => true,
                self::SHOW_RELATED => true,
                self::SHOW_DATA => isset($includeRelationships['attributeValues']),
                self::DATA => function () use ($resource) {
                    return $resource->attributeValues;
                },
            ],
        ];
    }
}
