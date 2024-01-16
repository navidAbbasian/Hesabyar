<?php

namespace App\Containers\AppSection\PersonCategory\Models;

use App\Containers\AppSection\Person\Models\Person;
use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class PersonCategory extends ParentModel
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
    protected string $resourceKey = 'PersonCategory';

    public function persons(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Person::class);
    }
}
