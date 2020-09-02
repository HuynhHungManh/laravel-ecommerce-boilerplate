<?php

namespace Arabia\Attribute\Models;

use Illuminate\Database\Eloquent\Model;
use Arabia\Attribute\Contracts\AttributeContract;

class Attribute extends Model implements AttributeContract
{
    /**
     * @var string
     */
    protected $table = 'attributes';

    /**
     * @var array
     */
    protected $fillable = [
        'code', 'name', 'frontend_type', 'is_filterable', 'is_required'
    ];

    public function attributeFamilies()
    {
        return $this->belongsToMany('Arabia\Attribute\Models\AttributeFamily', 'attribute_families_attributes');
    }
}
