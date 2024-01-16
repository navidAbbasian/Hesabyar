<?php

namespace App\Containers\AppSection\SideIncomeCategory\Models;

use App\Containers\AppSection\SideIncome\Models\SideIncome;
use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class SideIncomeCategory extends ParentModel
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
    protected string $resourceKey = 'SideIncomeCategory';

    public function sideIncomes(): HasMany
    {
        return $this->hasMany(SideIncome::class, 'side_income_category_id', 'id');
    }
}
