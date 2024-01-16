<?php

namespace App\Containers\AppSection\BuyProductFactorItem\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\BuyProductFactorItem\Models\BuyProductFactorItem;
use App\Containers\AppSection\BuyProductFactorItem\Tasks\UpdateBuyProductFactorItemTask;
use App\Containers\AppSection\BuyProductFactorItem\UI\API\Requests\UpdateBuyProductFactorItemRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateBuyProductFactorItemAction extends ParentAction
{
    /**
     * @param UpdateBuyProductFactorItemRequest $request
     * @return BuyProductFactorItem
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateBuyProductFactorItemRequest $request): BuyProductFactorItem
    {
        $data = $request->sanitizeInput([
            // add your request data here
            'number',
            'unit_amount',
            'factor_id',
            'product_id'
        ]);

        return app(UpdateBuyProductFactorItemTask::class)->run($data, $request->id);
    }
}
