<?php

namespace App\Containers\AppSection\Transaction\Tasks;

use App\Containers\AppSection\ChequeReceived\Models\ChequeReceived;
use App\Containers\AppSection\Person\Models\Person;
use App\Containers\AppSection\Transaction\Data\Repositories\TransactionRepository;
use App\Containers\AppSection\Transaction\Events\TransactionCreatedEvent;
use App\Containers\AppSection\Transaction\Models\Transaction;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CreateTransactionTask extends ParentTask
{
    public function __construct(
        protected TransactionRepository $repository
    )
    {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Transaction
    {
        try {
        DB::beginTransaction();

        $transaction = $this->repository->create($data);

        TransactionCreatedEvent::dispatch($transaction);
        DB::commit();
        return $transaction;
        } catch (Exception) {
            DB::rollBack();
            throw new CreateResourceFailedException();
        }
    }
}
