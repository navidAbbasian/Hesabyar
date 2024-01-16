<?php

namespace App\Containers\AppSection\SellProductFactorItem\Models;

use App\Containers\AppSection\Product\Models\Product;
use App\Containers\AppSection\SellProductFactor\Models\SellProductFactor;
use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SellProductFactorItem extends ParentModel
{
    protected $guarded = [];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'SellProductFactorItem';

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class)->withTrashed();
    }

    public function sellProductFactor(): BelongsTo
    {
        return $this->belongsTo(SellProductFactor::class, 'factor_id', 'id')->withTrashed();
    }
}
