<?php

namespace App\Containers\AppSection\ChequeReceived\Tasks;

use App\Containers\AppSection\ChequeReceived\Data\Repositories\ChequeReceivedRepository;
use App\Containers\AppSection\ChequeReceived\Events\ChequeReceivedDeletedEvent;
use App\Containers\AppSection\Person\Models\Person;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Storage;

class DeleteChequeReceivedTask extends ParentTask
{
    public function __construct(
        protected ChequeReceivedRepository $repository
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run($id): int
    {
        try {

            $selectedCheque = $this->repository->find($id);
            if ($selectedCheque['image'] != null && Storage::disk('s3')->exists($selectedCheque['image'])) {
                Storage::disk('s3')->delete($selectedCheque['image']);
            }



            $result = $this->repository->delete($id);
            ChequeReceivedDeletedEvent::dispatch($result);

            return $result;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
