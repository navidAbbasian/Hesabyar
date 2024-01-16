<?php

namespace App\Containers\AppSection\ChequePayment\Tasks;

use App\Containers\AppSection\ChequePayment\Data\Repositories\ChequePaymentRepository;
use App\Containers\AppSection\ChequePayment\Events\ChequePaymentFoundByIdEvent;
use App\Containers\AppSection\ChequePayment\Models\ChequePayment;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindChequePaymentByIdTask extends ParentTask
{
    public function __construct(
        protected ChequePaymentRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): ChequePayment
    {
        try {
            $chequepayment = $this->repository->withTrashed()->find($id);
            ChequePaymentFoundByIdEvent::dispatch($chequepayment);

            return $chequepayment;
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
