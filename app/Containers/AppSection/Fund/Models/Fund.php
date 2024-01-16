<?php

namespace App\Containers\AppSection\Fund\Models;

use App\Containers\AppSection\Transaction\Models\Transaction;
use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fund extends ParentModel
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
    protected string $resourceKey = 'Fund';

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'fund_id','id');
    }

}
