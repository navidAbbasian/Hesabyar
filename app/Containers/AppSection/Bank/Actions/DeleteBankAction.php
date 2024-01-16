<?php

namespace App\Containers\AppSection\Bank\Actions;

use App\Containers\AppSection\Bank\Tasks\DeleteBankTask;
use App\Containers\AppSection\Bank\UI\API\Requests\DeleteBankRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteBankAction extends ParentAction
{
    /**
     * @param DeleteBankRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteBankRequest $request): int
    {
        return app(DeleteBankTask::class)->run($request->id);
    }
}
