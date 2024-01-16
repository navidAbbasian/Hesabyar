<?php

namespace App\Containers\AppSection\ChequePayment\Models;

use App\Containers\AppSection\Person\Models\Person;
use App\Containers\AppSection\Transaction\Models\Transaction;
use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChequePayment extends ParentModel
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
    protected string $resourceKey = 'ChequePayment';

    public function person(): BelongsTo
    {
        return $this->belongsTo(Person::class)->withTrashed();
    }

}
