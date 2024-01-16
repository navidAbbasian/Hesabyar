<?php

namespace App\Containers\AppSection\Unit\Models;

use App\Containers\AppSection\Product\Models\Product;
use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unit extends ParentModel
{
    use SoftDeletes;

    protected $guarded = [];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'Unit';

    public function product(): HasOne
    {
        return $this->hasOne(Product::class, 'unit_id', 'id');
    }
}
