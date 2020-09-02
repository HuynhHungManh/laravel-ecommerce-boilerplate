<?php

namespace Arabia\Attribute\Repositories;

use Arabia\Attribute\Models\AttributeValue;
use Illuminate\Http\UploadedFile;
use Arabia\Attribute\Contracts\AttributeValueContract;
use Arabia\Core\Eloquent\Repository;

/**
 * Class AttributeRepository
 *
 * @package \App\Repositories
 */
class AttributeValueRepository extends Repository implements AttributeValueContract
{
    public function model()
    {
        return AttributeValue::class;
    }
}
