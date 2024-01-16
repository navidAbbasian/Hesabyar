<?php

namespace App\Containers\AppSection\BankNameList\Tasks;

use App\Containers\AppSection\BankNameList\Data\Repositories\BankNameListRepository;
use App\Containers\AppSection\BankNameList\Events\BankNameListDeletedEvent;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DeleteBankNameListTask extends ParentTask
{
    public function __construct(
        protected BankNameListRepository $repository
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run($id): int
    {
        try {
            $result = $this->repository->delete($id);
            BankNameListDeletedEvent::dispatch($result);

            return $result;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
