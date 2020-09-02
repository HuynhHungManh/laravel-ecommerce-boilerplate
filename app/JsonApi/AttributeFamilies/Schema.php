<?php

namespace App\JsonApi\AttributeFamilies;

use Neomerx\JsonApi\Schema\SchemaProvider;

class Schema extends SchemaProvider
{

    /**
     * @var string
     */
    protected $resourceType = 'attribute-families';

    protected $relationships = [
        'products',
        'attributes',
    ];

    /**
     * @param \App\AttributeFamily $resource
     *      the domain record being serialized.
     * @return string
     */
    public function getId($resource)
    {
        return (string) $resource->getRouteKey();
    }

    /**
     * @param \App\AttributeFamily $resource
     *      the domain record being serialized.
     * @return array
     */
    public function getAttributes($resource)
    {
        return [
            'code' => $resource->code,
            'name' => $resource->name,
            'status' => $resource->status,
            'is_user_defined' => $resource->is_user_defined,
            'created-at' => $resource->created_at->toAtomString(),
            'updated-at' => $resource->updated_at->toAtomString(),
        ];
    }

    public function getRelationships($resource, $isPrimary, array $includeRelationships)
    {
        return [
            'products' => [
                self::SHOW_SELF => true,
                self::SHOW_RELATED => true,
                self::SHOW_DATA => isset($includeRelationships['products']),
                self::DATA => function () use ($resource) {
                    return $resource->products;
                },
                self::META => function () use ($resource) {
                    return [
                        'total' => $resource->products->count(),
                    ];
                },
            ],
            'attributes' => [
                self::SHOW_SELF => true,
                self::SHOW_RELATED => true,
                self::SHOW_DATA => isset($includeRelationships['attributes']),
                self::DATA => function () use ($resource) {
                    return $resource->attributes;
                },
                self::META => function () use ($resource) {
                    return [
                        'total' => $resource->attributes->count(),
                    ];
                },
            ],
        ];
    }
}
