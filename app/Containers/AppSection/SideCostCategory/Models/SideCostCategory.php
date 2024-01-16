<?php

namespace App\Containers\AppSection\SideCostCategory\Models;

use App\Containers\AppSection\SideCost\Models\SideCost;
use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class SideCostCategory extends ParentModel
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
    protected string $resourceKey = 'SideCostCategory';

   public function sideCosts()
   {
       return $this->hasMany(SideCost::class,'side_cost_category_id', 'id');
   }
}
