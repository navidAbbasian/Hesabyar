<?php

namespace App\Containers\AppSection\ChequePayment\Tasks;

use App\Containers\AppSection\ChequePayment\Data\Repositories\ChequePaymentRepository;
use App\Containers\AppSection\ChequePayment\Models\ChequePayment;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateChequePaymentStatusTask extends ParentTask
{
    public function __construct(
        protected ChequePaymentRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): ChequePayment
    {
        try {

            $cheque = $this->repository->find($id);
            $cheque['status'] = $data['status'];

            $cheque->save();

            return $cheque; /*$this->repository->update($data, $id);*/

        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
