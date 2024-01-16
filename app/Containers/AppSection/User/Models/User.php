<?php

namespace App\Containers\AppSection\User\Models;

use App\Containers\AppSection\Authentication\Notifications\VerifyEmail;
use App\Containers\AppSection\Authentication\Traits\AuthenticationTrait;
use App\Containers\AppSection\Authorization\Traits\AuthorizationTrait;
use App\Containers\AppSection\ChequeReceived\Models\ChequeReceived;
use App\Containers\AppSection\SellProductFactor\Models\SellProductFactor;
use App\Containers\AppSection\SideIncome\Models\SideIncome;
use App\Containers\AppSection\Transaction\Models\Transaction;
use App\Ship\Contracts\MustVerifyEmail;
use App\Ship\Parents\Models\UserModel as ParentUserModel;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Validation\Rules\Password;

class User extends ParentUserModel implements MustVerifyEmail
{
    use AuthorizationTrait;
    use AuthenticationTrait;
    use Notifiable;
    use SoftDeletes;

    protected $guarded = [];
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'birth' => 'date',
    ];

    public static function getPasswordValidationRules(): Password
    {
        return Password::min(8)
            ->letters()
            ->mixedCase()
            ->numbers()
            ->symbols();
    }

    public function sendEmailVerificationNotificationWithVerificationUrl(string $verificationUrl): void
    {
        $this->notify(new VerifyEmail($verificationUrl));
    }

    protected function email(): Attribute
    {
        return new Attribute(
            get: fn(string $value): string => strtolower($value),
        );
    }

    public function children(): HasMany
    {
        return $this->hasMany(User::class, 'parent_id', 'id')/*->with('children')*/ ;
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(User::class, 'parent_id')->withTrashed();
    }

    public function sellProductFactors(): HasMany
    {
        return $this->hasMany(SellProductFactor::class, 'user_id', 'id')->withTrashed();
    }

    public function sideIncomes()
    {
        return $this->hasMany(SideIncome::class, 'user_id', 'id');
    }

    public function chequeReceiveds()
    {
        return $this->hasMany(ChequeReceived::class, 'user_id', 'id');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'user_id', 'id');
    }

//   public function getBalanceAttribute(){
//        return $this->transactions()->where('is_deposit', '1')->sum('amount')
//                - $this->transactions()->where('is_deposit', '0')->sum('amount');
//   }

    public function getCommissionAmountAttribute()
    {
        return $this->transactions()->where('type', 7)->sum('amount');
    }



//    public function getSumTotalSellerSalesAttribute()
//    {
//        $transactionWithCheque = $this->transactions()->with('chequeReceive', function ($query) {
//            return $query->where('status', 1);
//        })->where('is_deposit', '1')->whereNotNull('sell_product_factor_id');
//
//
//        return $transactionWithCheque->get()->map(function ($query) {
//            return $query->chequeReceive !== null || $query->cheque_receive_id === null ? $query->amount : 0;
//        })->sum();
//    }

    public function getSumTotalSellerSalesAttribute()
    {
        return $this->transactions()->where('is_deposit', '1')->whereNotNull('side_income_id')->sum('amount');
    }

    public function getSumTotalSellerSaleOfSaleManagerAttribute()
    {
        $getSumTotalSellerSaleOfSaleManager = $this->children()->get();
        return $getSumTotalSellerSaleOfSaleManager->map(function ($q) {
            return $q->getSumTotalSellerSalesAttribute();
        })->sum();
    }
    public function getCommissionAndSubCommissionAttribute()
    {
        return $this->getSubCommissionAmountAttribute()
            + $this->transactions()->where('type', 7)->sum('amount');
    }
    public function getSubCommissionAmountAttribute()
    {

        $subCommissionFromSellers = ($this->getSumTotalSellerSalesAttribute() + $this->getSumTotalSellerSaleOfSaleManagerAttribute()) * $this->sub_commission / 100   ;
        return $subCommissionFromSellers;
    }
}
