<?php

namespace App\Containers\AppSection\Bank\Models;

use App\Containers\AppSection\SellProductFactor\Models\SellProductFactor;
use App\Containers\AppSection\Transaction\Models\Transaction;
use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bank extends ParentModel
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
    protected string $resourceKey = 'Bank';

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class, 'bank_id', 'id');
    }

    public function sellProductFactors(): HasMany
    {
        return $this->hasMany(SellProductFactor::class,'bank_id', 'id');
    }
}
