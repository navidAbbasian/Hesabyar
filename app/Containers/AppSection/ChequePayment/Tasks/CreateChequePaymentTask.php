<?php

namespace App\Containers\AppSection\ChequePayment\Tasks;

use App\Containers\AppSection\ChequePayment\Data\Repositories\ChequePaymentRepository;
use App\Containers\AppSection\ChequePayment\Events\ChequePaymentCreatedEvent;
use App\Containers\AppSection\ChequePayment\Models\ChequePayment;
use App\Containers\AppSection\Person\Models\Person;
use App\Containers\AppSection\Transaction\Data\Repositories\TransactionRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateChequePaymentTask extends ParentTask
{
    public function __construct(
        protected ChequePaymentRepository $repository,
        protected TransactionRepository $transactionRepository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): ChequePayment
    {
        try {

            $chequepayment = $this->repository->create($data);

            /** create transaction */
            $this->transactionRepository->create([
                'is_deposit' => 0,
                'type' => 4,
                'amount' => $data['amount'],
                'person_id' => $data['person_id'],
                'cheque_payment_id' => $chequepayment->id
            ]);

            ChequePaymentCreatedEvent::dispatch($chequepayment);

            return $chequepayment;
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
