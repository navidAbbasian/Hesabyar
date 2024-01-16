<?php

namespace App\Containers\AppSection\SellProductFactor\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\SellProductFactor\Models\SellProductFactor;
use App\Containers\AppSection\SellProductFactor\Tasks\CreateSellProductFactorTask;
use App\Containers\AppSection\SellProductFactor\UI\API\Requests\CreateSellProductFactorRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateSellProductFactorAction extends ParentAction
{
    /**
     * @param CreateSellProductFactorRequest $request
     * @return mixed
     * @throws IncorrectIdException
     */
    public function run(CreateSellProductFactorRequest $request): mixed
    {
        $data = $request->sanitizeInput([
            // add your request data here
            'factor_number',
            'reverse',
//            'title',
            'due_date',
            'sell_date',
            'discount_type',
            'discount',
            'tax',
            'description',
            'sum_total_factor',
            'profit',
            'person_id',
            'supplier_id',
            'user_id',
            'bank_id',
            'products'
        ]);

        return app(CreateSellProductFactorTask::class)->run($data);
    }
}
