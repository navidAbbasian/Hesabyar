<?php

namespace App\Containers\AppSection\BuyProductFactorItem\Actions;

use App\Containers\AppSection\BuyProductFactorItem\Models\BuyProductFactorItem;
use App\Containers\AppSection\BuyProductFactorItem\Tasks\FindBuyProductFactorItemByIdTask;
use App\Containers\AppSection\BuyProductFactorItem\UI\API\Requests\FindBuyProductFactorItemByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindBuyProductFactorItemByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindBuyProductFactorItemByIdRequest $request): BuyProductFactorItem
    {
        return app(FindBuyProductFactorItemByIdTask::class)->run($request->id);
    }
}
