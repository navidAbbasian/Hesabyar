<?php

namespace App\Containers\AppSection\SideIncome\Models;

use App\Containers\AppSection\Bank\Models\Bank;
use App\Containers\AppSection\ChequeReceived\Models\ChequeReceived;
use App\Containers\AppSection\Fund\Models\Fund;
use App\Containers\AppSection\Person\Models\Person;
use App\Containers\AppSection\SideIncomeCategory\Models\SideIncomeCategory;
use App\Containers\AppSection\User\Models\User;
use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class SideIncome extends ParentModel
{
    use SoftDeletes;

    protected $table = 'side_incomes';

    protected $guarded = [];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'SideIncome';

    public function sideIncomeCategory(): BelongsTo
    {
        return $this->belongsTo(SideIncomeCategory::class,'side_income_category_id', 'id')->withTrashed();
    }

    public function person()
    {
        return $this->belongsTo(Person::class,'person_id', 'id')->withTrashed();
    }
    public function bank(): BelongsTo
    {
        return $this->belongsTo(Bank::class,'bank_id', 'id')->withTrashed();
    }
    public function fund(): BelongsTo
    {
        return $this->belongsTo(Fund::class,'fund_id', 'id')->withTrashed();
    }
    public function chequeReceive(): BelongsTo
    {
        return $this->belongsTo(ChequeReceived::class, 'cheque_receive_id', 'id')->withTrashed();
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id')->withTrashed();
    }
}
