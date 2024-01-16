<?php

namespace App\Containers\AppSection\Person\Models;

use App\Containers\AppSection\BuyProductFactor\Models\BuyProductFactor;
use App\Containers\AppSection\ChequePayment\Models\ChequePayment;
use App\Containers\AppSection\Company\Models\Company;
use App\Containers\AppSection\PersonCategory\Models\PersonCategory;
use App\Containers\AppSection\SellProductFactor\Models\SellProductFactor;
use App\Containers\AppSection\SideCost\Models\SideCost;
use App\Containers\AppSection\SideIncome\Models\SideIncome;
use App\Containers\AppSection\Transaction\Models\Transaction;
use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Person extends ParentModel
{
    use SoftDeletes;

    protected $table = 'persons';

    protected $guarded = [];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'Person';

    public function personCategory(): BelongsTo
    {
        return $this->belongsTo(PersonCategory::class)->withTrashed();
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'company_id', 'id')->withTrashed();
    }

    public function chequePayments(): HasMany
    {
        return $this->hasMany(ChequePayment::class);
    }

    public function buyProductFactors(): HasMany
    {
        return $this->hasMany(BuyProductFactor::class);
    }

    public function sellProductFactors(): HasMany
    {
        return $this->hasMany(SellProductFactor::class);
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class, 'person_id', 'id');
    }

    public function sideIncomes(): HasMany
    {
        return $this->hasMany(SideIncome::class, 'person_id', 'id');
    }

    public function sideCosts(): HasMany
    {
        return $this->hasMany(SideCost::class, 'person_id', 'id');
    }

    public function getBalanceAttribute()
    {
        return $this->transactions()->where('is_deposit', '1')->sum('amount')
            - $this->transactions()->where('is_deposit', '0')->sum('amount');
    }
}
