<?php

namespace App\Containers\AppSection\Stockholder\Actions;

use App\Containers\AppSection\Stockholder\Tasks\DeleteStockholderTask;
use App\Containers\AppSection\Stockholder\UI\API\Requests\DeleteStockholderRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteStockholderAction extends ParentAction
{
    /**
     * @param DeleteStockholderRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteStockholderRequest $request): int
    {
        return app(DeleteStockholderTask::class)->run($request->id);
    }
}
