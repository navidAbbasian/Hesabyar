<?php

namespace App\Containers\AppSection\ChequeReceived\Tasks;

use App\Containers\AppSection\ChequeReceived\Data\Repositories\ChequeReceivedRepository;
use App\Containers\AppSection\ChequeReceived\Models\ChequeReceived;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateChequeReceivedStatusTask extends ParentTask
{
    public function __construct(
        protected ChequeReceivedRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): ChequeReceived
    {
        try {

            $cheque = $this->repository->find($id);
            $cheque['status'] = $data['status'];

            $cheque->save();

            return $cheque;/*$this->repository->update($data, $id);*/
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
