<?php

namespace App\Containers\AppSection\BuyProductFactor\Actions;

use App\Containers\AppSection\BuyProductFactor\Tasks\DeleteBuyProductFactorTask;
use App\Containers\AppSection\BuyProductFactor\UI\API\Requests\DeleteBuyProductFactorRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteBuyProductFactorAction extends ParentAction
{
    /**
     * @param DeleteBuyProductFactorRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteBuyProductFactorRequest $request): int
    {
        return app(DeleteBuyProductFactorTask::class)->run($request->id);
    }
}
