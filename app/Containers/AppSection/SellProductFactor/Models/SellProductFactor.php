<?php

namespace App\Containers\AppSection\SellProductFactor\Models;

use App\Containers\AppSection\Bank\Models\Bank;
use App\Containers\AppSection\Person\Models\Person;
use App\Containers\AppSection\SellProductFactorItem\Models\SellProductFactorItem;
use App\Containers\AppSection\Supplier\Models\Supplier;
use App\Containers\AppSection\User\Models\User;
use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class SellProductFactor extends ParentModel
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
    protected string $resourceKey = 'SellProductFactor';

    public function sellProductFactorItems(): HasMany
    {
        return $this->hasMany(SellProductFactorItem::class,'factor_id','id');
    }

    public function person(): BelongsTo
    {
        return $this->belongsTo(Person::class)->withTrashed();
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id', 'id')->withTrashed();
    }
    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class)->withTrashed();
    }
    public function bank()
    {
        return $this->belongsTo(Bank::class, 'bank_id', 'id')->withTrashed();
    }

    public function getPersonBalanceAttribute()
    {
        return $this->person->transactions->where('is_deposit', '1')->sum('amount')
            - $this->person->transactions->where('is_deposit', '0')->sum('amount');
    }
}
