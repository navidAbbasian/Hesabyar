<?php

namespace App\Containers\AppSection\SellProductFactor\Actions;

use App\Containers\AppSection\SellProductFactor\Tasks\DeleteSellProductFactorTask;
use App\Containers\AppSection\SellProductFactor\UI\API\Requests\DeleteSellProductFactorRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteSellProductFactorAction extends ParentAction
{
    /**
     * @param DeleteSellProductFactorRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteSellProductFactorRequest $request): int
    {
        return app(DeleteSellProductFactorTask::class)->run($request->id);
    }
}
