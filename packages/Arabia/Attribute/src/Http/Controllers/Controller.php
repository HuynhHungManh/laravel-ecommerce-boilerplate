<?php

namespace Arabia\Attribute\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use CloudCreativity\LaravelJsonApi\Http\Controllers\JsonApiController;

class Controller extends JsonApiController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
