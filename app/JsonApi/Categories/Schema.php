<?php

namespace App\JsonApi\Categories;

use Neomerx\JsonApi\Schema\SchemaProvider;

class Schema extends SchemaProvider
{

    /**
     * @var string
     */
    protected $resourceType = 'categories';

    protected $relationships = [
        'products',
    ];

    /**
     * @param \App\Category $resource
     *      the domain record being serialized.
     * @return string
     */
    public function getId($resource)
    {
        return (string) $resource->getRouteKey();
    }

    /**
     * @param \App\Category $resource
     *      the domain record being serialized.
     * @return array
     */
    public function getAttributes($resource)
    {
        return [
            'name' => $resource->name,
            'slug' => $resource->slug,
            'description' => $resource->description,
            'parent_id' => $resource->parent_id,
            'featured' => $resource->featured,
            'menu' => $resource->menu,
            'image' => $resource->image,
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
        ];
    }
}
