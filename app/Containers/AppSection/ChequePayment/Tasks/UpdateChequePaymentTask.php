<?php

namespace App\Containers\AppSection\ChequePayment\Tasks;

use App\Containers\AppSection\ChequePayment\Data\Repositories\ChequePaymentRepository;
use App\Containers\AppSection\ChequePayment\Events\ChequePaymentUpdatedEvent;
use App\Containers\AppSection\ChequePayment\Models\ChequePayment;
use App\Containers\AppSection\Person\Models\Person;
use App\Containers\AppSection\Transaction\Data\Repositories\TransactionRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateChequePaymentTask extends ParentTask
{
    public function __construct(
        protected ChequePaymentRepository $repository,
        protected TransactionRepository $transactionRepository
    )
    {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): ChequePayment
    {
        try {

            $transaction = $this->transactionRepository->where('cheque_payment_id', $id)->first();
            $transaction['amount'] = $data['amount'];

            $transaction->save();

            $chequepayment = $this->repository->update($data, $id);
            ChequePaymentUpdatedEvent::dispatch($chequepayment);

            return $chequepayment;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
