<?php

namespace App\Containers\AppSection\FinancialReport\Models;

use App\Ship\Parents\Models\Model as ParentModel;

class FinancialReport extends ParentModel
{
    protected $guarded = [];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'Financial Report';
}
