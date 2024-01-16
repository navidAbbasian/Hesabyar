<?php

namespace App\Containers\AppSection\SellProductFactorItem\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\SellProductFactorItem\Models\SellProductFactorItem;
use App\Containers\AppSection\SellProductFactorItem\Tasks\CreateSellProductFactorItemTask;
use App\Containers\AppSection\SellProductFactorItem\UI\API\Requests\CreateSellProductFactorItemRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateSellProductFactorItemAction extends ParentAction
{
    /**
     * @param CreateSellProductFactorItemRequest $request
     * @return SellProductFactorItem
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateSellProductFactorItemRequest $request): SellProductFactorItem
    {
        $data = $request->sanitizeInput([
            // add your request data here
            'number',
            'unit_amount',
            'product_id',
            'factor_id'
        ]);

        return app(CreateSellProductFactorItemTask::class)->run($data);
    }
}
