<?php

namespace App\Containers\AppSection\Bank\Tasks;

use App\Containers\AppSection\Bank\Data\Repositories\BankRepository;
use App\Containers\AppSection\Bank\Events\BankCreatedEvent;
use App\Containers\AppSection\Bank\Models\Bank;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateBankTask extends ParentTask
{
    public function __construct(
        protected BankRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Bank
    {
        try {
            $bank = $this->repository->create($data);
            BankCreatedEvent::dispatch($bank);

            return $bank;
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
