<?php

namespace App\Containers\AppSection\Transaction\UI\API\Transformers;

use App\Containers\AppSection\Bank\UI\API\Transformers\BankTransformer;
use App\Containers\AppSection\BuyProductFactor\UI\API\Transformers\BuyProductFactorTransformer;
use App\Containers\AppSection\ChequePayment\UI\API\Transformers\ChequePaymentTransformer;
use App\Containers\AppSection\ChequeReceived\UI\API\Transformers\ChequeReceivedTransformer;
use App\Containers\AppSection\Fund\UI\API\Transformers\FundTransformer;
use App\Containers\AppSection\Person\UI\API\Transformers\PersonTransformer;
use App\Containers\AppSection\SellProductFactor\Models\SellProductFactor;
use App\Containers\AppSection\SellProductFactor\UI\API\Transformers\SellProductFactorTransformer;
use App\Containers\AppSection\SideIncome\UI\API\Transformers\SideIncomeTransformer;
use App\Containers\AppSection\Transaction\Models\Transaction;
use App\Containers\AppSection\User\UI\API\Transformers\UserTransformer;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class TransactionTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [
        'person',
        'user',
        'bank',
        'fund',
        'chequeReceive',
        'chequePayment',
        'sellProductFactor',
        'buyProductFactor',
        'sideIncome',
        'sideCost'
    ];

    public function transform(Transaction $transaction): array
    {
        $response = [
            'object' => $transaction->getResourceKey(),
            'id' => $transaction->getHashedKey(),
            'amount' => $transaction->amount,
            'description' => $transaction->description,
            'type' => $transaction->type,
            'created_at' => $transaction->created_at,
            'deleted_at' => $transaction->deleted_at
        ];

        return $this->ifAdmin([
            'real_id' => $transaction->id,
            'updated_at' => $transaction->updated_at,
            'readable_created_at' => $transaction->created_at->diffForHumans(),
            'readable_updated_at' => $transaction->updated_at->diffForHumans(),
            // 'deleted_at' => $transaction->deleted_at,
        ], $response);
    }

    public function includePerson(Transaction $transaction): \League\Fractal\Resource\Item
    {
        return $this->item($transaction->person, new PersonTransformer());
    }

    public function includeUser(Transaction $transaction)
    {
        if ($transaction->user_id != null) {
            return $this->item($transaction->user, new UserTransformer());
        } else {
            return;
        }
    }

    public function includeFund(Transaction $transaction)
    {
        if ($transaction->fund_id != null) {
            return $this->item($transaction->fund, new FundTransformer());
        } else {
            return;
        }
    }

    public function includeBank(Transaction $transaction)
    {
        if ($transaction->bank_id != null) {
            return $this->item($transaction->bank, new BankTransformer());
        } else {
            return;
        }
    }

    public function includeChequeReceive(Transaction $transaction)
    {
        if ($transaction->cheque_receive_id != null) {
            return $this->item($transaction->chequeReceive, new ChequeReceivedTransformer());
        } else {
            return;
        }
    }

    public function includeChequePayment(Transaction $transaction)
    {
        if ($transaction->cheque_payment_id != null) {
            return $this->item($transaction->chequePayment, new ChequePaymentTransformer());
        } else {
            return;
        }
    }

    public function includeSellProductFactor(Transaction $transaction)
    {
        if ($transaction->sell_product_factor_id != null) {
            return $this->item($transaction->sellProductFactor, new SellProductFactorTransformer());
        } else {
            return;
        }
    }
    public function includeBuyProductFactor(Transaction $transaction)
    {
        if ($transaction->buy_product_factor_id != null) {
            return $this->item($transaction->buyProductFactor, new BuyProductFactorTransformer());
        } else {
            return;
        }
    }
    public function includeSideIncome(Transaction $transaction)
    {
        if ($transaction->side_income_id != null) {
            return $this->item($transaction->sideIncome, new SideIncomeTransformer());
        } else {
            return;
        }
    }
    public function includeSideCost(Transaction $transaction)
    {
        if ($transaction->side_cost_id != null) {
            return $this->item($transaction->sideCost, new SideIncomeTransformer());
        } else {
            return;
        }
    }
}
