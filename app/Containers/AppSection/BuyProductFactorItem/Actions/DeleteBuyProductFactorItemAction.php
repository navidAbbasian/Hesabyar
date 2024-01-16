<?php

namespace App\Containers\AppSection\BuyProductFactorItem\Actions;

use App\Containers\AppSection\BuyProductFactorItem\Tasks\DeleteBuyProductFactorItemTask;
use App\Containers\AppSection\BuyProductFactorItem\UI\API\Requests\DeleteBuyProductFactorItemRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteBuyProductFactorItemAction extends ParentAction
{
    /**
     * @param DeleteBuyProductFactorItemRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteBuyProductFactorItemRequest $request): int
    {
        return app(DeleteBuyProductFactorItemTask::class)->run($request->id);
    }
}
