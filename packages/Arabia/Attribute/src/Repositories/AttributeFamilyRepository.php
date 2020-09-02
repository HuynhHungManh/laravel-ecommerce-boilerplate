<?php

namespace Arabia\Attribute\Repositories;

use Arabia\Attribute\Models\AttributeFamily;
use Illuminate\Http\UploadedFile;
use Arabia\Attribute\Contracts\AttributeFamilyContract;
use Arabia\Core\Eloquent\Repository;

/**
 * Class AttributeRepository
 *
 * @package \App\Repositories
 */
class AttributeFamilyRepository extends Repository implements AttributeFamilyContract
{
    public function model()
    {
        return AttributeFamily::class;
    }
}
