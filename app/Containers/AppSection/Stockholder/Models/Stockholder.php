<?php

namespace App\Containers\AppSection\Stockholder\Models;

use App\Containers\AppSection\Company\Models\Company;
use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stockholder extends ParentModel
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
    protected string $resourceKey = 'Stockholder';

//    public function company()
//    {
//        return $this->belongsTo(Company::class);
//    }

}
