<?php

namespace App\Containers\AppSection\BankNameList\Tasks;

use App\Containers\AppSection\BankNameList\Data\Repositories\BankNameListRepository;
use App\Containers\AppSection\BankNameList\Events\BankNameListFoundByIdEvent;
use App\Containers\AppSection\BankNameList\Models\BankNameList;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindBankNameListByIdTask extends ParentTask
{
    public function __construct(
        protected BankNameListRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): BankNameList
    {
        try {
            $banknamelist = $this->repository->find($id);
            BankNameListFoundByIdEvent::dispatch($banknamelist);

            return $banknamelist;
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
