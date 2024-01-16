<?php

namespace App\Containers\AppSection\Company\Models;

use App\Containers\AppSection\Person\Models\Person;
use App\Containers\AppSection\SellProductFactor\Models\SellProductFactor;
use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends ParentModel
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
    protected string $resourceKey = 'Company';

    public function persons(): HasMany
    {
        return $this->hasMany(Person::class, 'company_id', 'id');
    }

    public function sellProductFactors(): HasMany
    {
        return $this->hasMany(SellProductFactor::class);
    }
}
