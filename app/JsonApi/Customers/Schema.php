<?php

namespace App\JsonApi\Customers;

use Neomerx\JsonApi\Schema\SchemaProvider;

class Schema extends SchemaProvider
{

    /**
     * @var string
     */
    protected $resourceType = 'customers';

    /**
     * @param \App\Customer $resource
     *      the domain record being serialized.
     * @return string
     */
    public function getId($resource)
    {
        return (string) $resource->getRouteKey();
    }

    /**
     * @param \App\Customer $resource
     *      the domain record being serialized.
     * @return array
     */
    public function getAttributes($resource)
    {
        return [
            'first_name' => $resource->first_name,
            'last_name' => $resource->last_name,
            'gender' => $resource->gender,
            'date_of_birth' => $resource->date_of_birth,
            'email' => $resource->email,
            'phone' => $resource->phone,
            'is_verified' => $resource->phone,
            'token' => $resource->token,
            'notes' => $resource->notes,
            'status' => $resource->status,
            'created-at' => $resource->created_at->toAtomString(),
            'updated-at' => $resource->updated_at->toAtomString(),
        ];
    }
}
