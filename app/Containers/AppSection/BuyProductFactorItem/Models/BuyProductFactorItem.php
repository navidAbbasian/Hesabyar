<?php

namespace App\Containers\AppSection\BuyProductFactorItem\Models;

use App\Containers\AppSection\BuyProductFactor\Models\BuyProductFactor;
use App\Containers\AppSection\Product\Models\Product;
use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BuyProductFactorItem extends ParentModel
{
    protected $guarded = [];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'BuyProductFactorItem';

    public function buyProductFactor(): BelongsTo
    {
        return $this->belongsTo(BuyProductFactor::class,'factor_id', 'id')->withTrashed();
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class)->withTrashed();
    }
}
