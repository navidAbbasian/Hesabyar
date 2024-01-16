<?php

namespace App\Containers\AppSection\SellProductFactorItem\Actions;

use App\Containers\AppSection\SellProductFactorItem\Models\SellProductFactorItem;
use App\Containers\AppSection\SellProductFactorItem\Tasks\FindSellProductFactorItemByIdTask;
use App\Containers\AppSection\SellProductFactorItem\UI\API\Requests\FindSellProductFactorItemByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindSellProductFactorItemByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindSellProductFactorItemByIdRequest $request): SellProductFactorItem
    {
        return app(FindSellProductFactorItemByIdTask::class)->run($request->id);
    }
}
