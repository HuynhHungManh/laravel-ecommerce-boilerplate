<?php

namespace Arabia\Attribute\Models;

use Illuminate\Database\Eloquent\Model;
use Arabia\Attribute\Contracts\AttributeFamilyContract;

class AttributeFamily extends Model implements AttributeFamilyContract
{
    /**
     * @var string
     */
    protected $table = 'attribute_families';

    /**
     * @var array
     */
    protected $fillable = [
        'code', 'name', 'status', 'is_user_defined'
    ];

    public function products()
    {
        return $this->hasMany('Arabia\Product\Models\Product');
    }

    public function attributes()
    {
        return $this->belongsToMany('Arabia\Attribute\Models\Attribute', 'attribute_families_attributes');
    }
}
