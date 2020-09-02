<?php

namespace Arabia\Attribute\Repositories;

use Arabia\Attribute\Models\Attribute;
use Illuminate\Http\UploadedFile;
use Arabia\Attribute\Contracts\AttributeContract;
use Arabia\Core\Eloquent\Repository;

/**
 * Class AttributeRepository
 *
 * @package \App\Repositories
 */
class AttributeRepository extends Repository implements AttributeContract
{
    public function model()
    {
        return Attribute::class;
    }
}
