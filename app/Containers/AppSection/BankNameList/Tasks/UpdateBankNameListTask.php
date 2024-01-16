<?php

namespace App\Containers\AppSection\BankNameList\Tasks;

use App\Containers\AppSection\BankNameList\Data\Repositories\BankNameListRepository;
use App\Containers\AppSection\BankNameList\Events\BankNameListUpdatedEvent;
use App\Containers\AppSection\BankNameList\Models\BankNameList;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateBankNameListTask extends ParentTask
{
    public function __construct(
        protected BankNameListRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): BankNameList
    {
        try {
            $banknamelist = $this->repository->update($data, $id);
            BankNameListUpdatedEvent::dispatch($banknamelist);

            return $banknamelist;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
