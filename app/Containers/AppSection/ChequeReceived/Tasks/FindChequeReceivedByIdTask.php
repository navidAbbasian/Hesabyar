<?php

namespace App\Containers\AppSection\ChequeReceived\Tasks;

use App\Containers\AppSection\ChequeReceived\Data\Repositories\ChequeReceivedRepository;
use App\Containers\AppSection\ChequeReceived\Events\ChequeReceivedFoundByIdEvent;
use App\Containers\AppSection\ChequeReceived\Models\ChequeReceived;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindChequeReceivedByIdTask extends ParentTask
{
    public function __construct(
        protected ChequeReceivedRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): ChequeReceived
    {
        try {
            $chequereceived = $this->repository->withTrashed()->find($id);
            ChequeReceivedFoundByIdEvent::dispatch($chequereceived);

            return $chequereceived;
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
