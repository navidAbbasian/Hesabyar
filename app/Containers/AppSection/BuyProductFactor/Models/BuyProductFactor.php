<?php

namespace App\Containers\AppSection\BuyProductFactor\Models;

use App\Containers\AppSection\BuyProductFactorItem\Models\BuyProductFactorItem;
use App\Containers\AppSection\Person\Models\Person;
use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class BuyProductFactor extends ParentModel
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
    protected string $resourceKey = 'BuyProductFactor';

    public function person(): BelongsTo
    {
        return $this->belongsTo(Person::class)->withTrashed();
    }
    public function buyProductFactorItems(): HasMany
    {
        return $this->hasMany(BuyProductFactorItem::class,'factor_id', 'id');
    }
}
