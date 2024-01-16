<?php

namespace App\Containers\AppSection\BankNameList\Tasks;

use App\Containers\AppSection\BankNameList\Data\Repositories\BankNameListRepository;
use App\Containers\AppSection\BankNameList\Events\BankNameListCreatedEvent;
use App\Containers\AppSection\BankNameList\Models\BankNameList;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateBankNameListTask extends ParentTask
{
    public function __construct(
        protected BankNameListRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): BankNameList
    {
        try {


            $banknamelist = $this->repository->create($data);
            BankNameListCreatedEvent::dispatch($banknamelist);

            return $banknamelist;
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
