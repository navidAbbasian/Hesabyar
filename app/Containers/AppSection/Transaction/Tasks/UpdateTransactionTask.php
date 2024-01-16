<?php

namespace App\Containers\AppSection\Transaction\Tasks;

use App\Containers\AppSection\Transaction\Data\Repositories\TransactionRepository;
use App\Containers\AppSection\Transaction\Events\TransactionUpdatedEvent;
use App\Containers\AppSection\Transaction\Models\Transaction;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateTransactionTask extends ParentTask
{
    public function __construct(
        protected TransactionRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): Transaction
    {
        try {
            $transaction = $this->repository->update($data, $id);
            TransactionUpdatedEvent::dispatch($transaction);

            return $transaction;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
