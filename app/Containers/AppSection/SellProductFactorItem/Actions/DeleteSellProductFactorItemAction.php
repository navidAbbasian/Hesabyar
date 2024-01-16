<?php

namespace App\Containers\AppSection\SellProductFactorItem\Actions;

use App\Containers\AppSection\SellProductFactorItem\Tasks\DeleteSellProductFactorItemTask;
use App\Containers\AppSection\SellProductFactorItem\UI\API\Requests\DeleteSellProductFactorItemRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteSellProductFactorItemAction extends ParentAction
{
    /**
     * @param DeleteSellProductFactorItemRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteSellProductFactorItemRequest $request): int
    {
        return app(DeleteSellProductFactorItemTask::class)->run($request->id);
    }
}
