<?php

namespace App\Containers\AppSection\SideCost\Models;

use App\Containers\AppSection\Bank\Models\Bank;
use App\Containers\AppSection\ChequePayment\Models\ChequePayment;
use App\Containers\AppSection\Fund\Models\Fund;
use App\Containers\AppSection\Person\Models\Person;
use App\Containers\AppSection\SideCostCategory\Models\SideCostCategory;
use App\Containers\AppSection\User\Models\User;
use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class SideCost extends ParentModel
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
    protected string $resourceKey = 'SideCost';

    public function sideCostCategory(): BelongsTo
    {
        return $this->belongsTo(SideCostCategory::class, 'side_cost_category_id', 'id')->withTrashed();
    }

    public function person()
    {
        return $this->belongsTo(Person::class, 'person_id', 'id')->withTrashed();
    }
    public function bank(): BelongsTo
    {
        return $this->belongsTo(Bank::class,'bank_id', 'id')->withTrashed();
    }
    public function fund(): BelongsTo
    {
        return $this->belongsTo(Fund::class,'fund_id', 'id')->withTrashed();
    }
    public function chequePayment(): BelongsTo
    {
        return $this->belongsTo(ChequePayment::class, 'cheque_payment_id', 'id')->withTrashed();
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id')->withTrashed();
    }
}
