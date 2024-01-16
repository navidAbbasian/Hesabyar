<?php

namespace App\Containers\AppSection\BuyProductFactorItem\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\BuyProductFactorItem\Models\BuyProductFactorItem;
use App\Containers\AppSection\BuyProductFactorItem\Tasks\CreateBuyProductFactorItemTask;
use App\Containers\AppSection\BuyProductFactorItem\UI\API\Requests\CreateBuyProductFactorItemRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateBuyProductFactorItemAction extends ParentAction
{
    /**
     * @param CreateBuyProductFactorItemRequest $request
     * @return BuyProductFactorItem
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateBuyProductFactorItemRequest $request): BuyProductFactorItem
    {
        $data = $request->sanitizeInput([
            // add your request data here
            'number',
            'unit_amount',
            'factor_id',
            'product_id'
        ]);

        return app(CreateBuyProductFactorItemTask::class)->run($data);
    }
}
