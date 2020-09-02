<?php

namespace Arabia\Category\Http\Controllers;

use Arabia\Category\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use CloudCreativity\LaravelJsonApi\Http\Controllers\JsonApiController;
use Arabia\Category\Repositories\CategoryRepository;

class CategoryController extends Controller
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
}
