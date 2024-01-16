<?php

namespace App\Containers\AppSection\Transaction\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Transaction\Models\Transaction;
use App\Containers\AppSection\Transaction\Tasks\UpdateTransactionTask;
use App\Containers\AppSection\Transaction\UI\API\Requests\UpdateTransactionRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateTransactionAction extends ParentAction
{
    /**
     * @param UpdateTransactionRequest $request
     * @return Transaction
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateTransactionRequest $request): Transaction
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

        return app(UpdateTransactionTask::class)->run($data, $request->id);
    }
}
