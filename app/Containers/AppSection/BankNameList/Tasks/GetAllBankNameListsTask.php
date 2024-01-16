<?php

namespace App\Containers\AppSection\BankNameList\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\BankNameList\Data\Repositories\BankNameListRepository;
use App\Containers\AppSection\BankNameList\Events\BankNameListsListedEvent;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllBankNameListsTask extends ParentTask
{
    public function __construct(
        protected BankNameListRepository $repository
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        $result = $this->addRequestCriteria()->repository->paginate();
        BankNameListsListedEvent::dispatch($result);

        return $result;
    }
}
