<?php

namespace App\Containers\AppSection\ChequeReceived\Models;

use App\Containers\AppSection\Person\Models\Person;
use App\Containers\AppSection\Transaction\Models\Transaction;
use App\Containers\AppSection\User\Models\User;
use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChequeReceived extends ParentModel
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
    protected string $resourceKey = 'ChequeReceived';

    public function person()
    {
        return $this->belongsTo(Person::class)->withTrashed();
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id')->withTrashed();
    }
    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class, 'cheque_receive_id', 'id');
    }
}
