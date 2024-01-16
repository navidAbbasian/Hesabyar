<?php

namespace App\Containers\AppSection\ChequePayment\Tasks;

use App\Containers\AppSection\ChequePayment\Data\Repositories\ChequePaymentRepository;
use App\Containers\AppSection\ChequePayment\Events\ChequePaymentDeletedEvent;
use App\Containers\AppSection\Person\Models\Person;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DeleteChequePaymentTask extends ParentTask
{
    public function __construct(
        protected ChequePaymentRepository $repository
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
            ChequePaymentDeletedEvent::dispatch($result);

            return $result;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
