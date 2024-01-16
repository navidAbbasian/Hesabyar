<?php

namespace App\Containers\AppSection\Transaction\Models;

use App\Containers\AppSection\Bank\Models\Bank;
use App\Containers\AppSection\BuyProductFactor\Models\BuyProductFactor;
use App\Containers\AppSection\ChequePayment\Models\ChequePayment;
use App\Containers\AppSection\ChequeReceived\Models\ChequeReceived;
use App\Containers\AppSection\Fund\Models\Fund;
use App\Containers\AppSection\Person\Models\Person;
use App\Containers\AppSection\SellProductFactor\Models\SellProductFactor;
use App\Containers\AppSection\SideCost\Models\SideCost;
use App\Containers\AppSection\SideIncome\Models\SideIncome;
use App\Containers\AppSection\User\Models\User;
use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends ParentModel
{
    use SoftDeletes;

    protected $guarded = [];

    protected $primaryKey = 'id';

    protected $hidden = [

    ];

    protected $casts = [

    ];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'Transaction';

    public function person(): BelongsTo
    {
        return $this->belongsTo(Person::class,'person_id','id')->withTrashed();
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id')->withTrashed();
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
    public function chequePayment(): BelongsTo
    {
        return $this->belongsTo(ChequePayment::class, 'cheque_payment_id', 'id')->withTrashed();
    }
    public function sellProductFactor()
    {
        return $this->belongsTo(SellProductFactor::class, 'sell_product_factor_id', 'id')->withTrashed();
    }
    public function buyProductFactor()
    {
        return $this->belongsTo(BuyProductFactor::class, 'buy_product_factor_id', 'id')->withTrashed();
    }
    public function sideIncome(){
        return $this->belongsTo(SideIncome::class, 'side_income_id', 'id')->withTrashed();
    }
    public function sideCost(){
        return $this->belongsTo(SideCost::class, 'side_cost_id', 'id')->withTrashed();
    }

}
