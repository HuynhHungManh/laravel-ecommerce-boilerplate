<?php

namespace Arabia\Attribute\Http\Controllers;

use Arabia\Attribute\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use CloudCreativity\LaravelJsonApi\Http\Controllers\JsonApiController;
use Arabia\Attribute\Repositories\AttributeRepository;

class AttributeController extends Controller
{
    protected $attributeRepository;

    public function __construct(AttributeRepository $attributeRepository)
    {
        $this->attributeRepository = $attributeRepository;
    }
}
