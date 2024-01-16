<?php

namespace App\Containers\AppSection\BankNameList\Models;

use App\Ship\Parents\Models\Model as ParentModel;

class BankNameList extends ParentModel
{
    protected $guarded = [];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'BankNameList';
}
