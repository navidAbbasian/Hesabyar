<?php

namespace App\Containers\AppSection\SellProductFactorItem\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\SellProductFactorItem\Models\SellProductFactorItem;
use App\Containers\AppSection\SellProductFactorItem\Tasks\UpdateSellProductFactorItemTask;
use App\Containers\AppSection\SellProductFactorItem\UI\API\Requests\UpdateSellProductFactorItemRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateSellProductFactorItemAction extends ParentAction
{
    /**
     * @param UpdateSellProductFactorItemRequest $request
     * @return SellProductFactorItem
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateSellProductFactorItemRequest $request): SellProductFactorItem
    {
        $data = $request->sanitizeInput([
            // add your request data here
            'number',
            'unit_amount',
            'product_id',
            'factor_id'
        ]);

        return app(UpdateSellProductFactorItemTask::class)->run($data, $request->id);
    }
}
