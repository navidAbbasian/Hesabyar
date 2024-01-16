<?php

namespace App\Containers\AppSection\Transaction\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Transaction\Models\Transaction;
use App\Containers\AppSection\Transaction\Tasks\CreateTransactionTask;
use App\Containers\AppSection\Transaction\UI\API\Requests\CreateTransactionRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateTransactionAction extends ParentAction
{
    /**
     * @param CreateTransactionRequest $request
     * @return Transaction
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateTransactionRequest $request): Transaction
    {
        $data = $request->sanitizeInput([
            // add your request data here
            'type',
            'amount',
            'is_deposit',
            'person_id',
            'user_id',
            'bank_id',
            'fund_id',
            'cheque_receive_id',
            'cheque_payment_id',
            'sell_product_factor_id',
            'buy_product_factor_id',
            'side_income_id',
            'side_cost_id'
        ]);

        return app(CreateTransactionTask::class)->run($data);
    }
}
