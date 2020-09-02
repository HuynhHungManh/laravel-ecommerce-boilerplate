<?php

namespace App\JsonApi\Attributes;

use Neomerx\JsonApi\Schema\SchemaProvider;

class Schema extends SchemaProvider
{

    /**
     * @var string
     */
    protected $resourceType = 'attributes';

    protected $relationships = [
        'attribute-families',
    ];

    /**
     * @param \App\Attribute $resource
     *      the domain record being serialized.
     * @return string
     */
    public function getId($resource)
    {
        return (string) $resource->getRouteKey();
    }

    /**
     * @param \App\Attribute $resource
     *      the domain record being serialized.
     * @return array
     */
    public function getAttributes($resource)
    {
        return [
            'code' => $resource->code,
            'name' => $resource->name,
            'frontend_type' => $resource->frontend_type,
            'is_filterable' => $resource->is_filterable,
            'is_required' => $resource->is_required,
            'created-at' => $resource->created_at->toAtomString(),
            'updated-at' => $resource->updated_at->toAtomString(),
        ];
    }
}
