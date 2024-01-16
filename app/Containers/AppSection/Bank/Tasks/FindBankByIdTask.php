<?php

namespace App\Containers\AppSection\Bank\Tasks;

use App\Containers\AppSection\Bank\Data\Repositories\BankRepository;
use App\Containers\AppSection\Bank\Events\BankFoundByIdEvent;
use App\Containers\AppSection\Bank\Models\Bank;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindBankByIdTask extends ParentTask
{
    public function __construct(
        protected BankRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): Bank
    {
        try {
            $bank = $this->repository->withTrashed()->find($id);
            BankFoundByIdEvent::dispatch($bank);

            return $bank;
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
