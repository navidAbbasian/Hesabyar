<?php

namespace App\Containers\AppSection\SellProductFactor\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\SellProductFactor\Models\SellProductFactor;
use App\Containers\AppSection\SellProductFactor\Tasks\UpdateSellProductFactorTask;
use App\Containers\AppSection\SellProductFactor\UI\API\Requests\UpdateSellProductFactorRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateSellProductFactorAction extends ParentAction
{
    /**
     * @param UpdateSellProductFactorRequest $request
     * @return SellProductFactor
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateSellProductFactorRequest $request): SellProductFactor
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
            'products',
        ]);

        return app(UpdateSellProductFactorTask::class)->run($data, $request->id);
    }
}
