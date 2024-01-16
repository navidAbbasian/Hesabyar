<?php

namespace App\Containers\AppSection\Person\Tasks;

use App\Containers\AppSection\Person\Data\Repositories\PersonRepository;
use App\Containers\AppSection\Person\Events\PersonDeletedEvent;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Storage;

class DeletePersonTask extends ParentTask
{
    public function __construct(
        protected PersonRepository $repository
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run($id): int
    {
        try {

            $deleteImage = $this->repository->find($id);
            if ($deleteImage['image'] != null &&Storage::disk('s3')->exists($deleteImage['image'])) {
                Storage::disk('s3')->delete($deleteImage['image']);
            }

            $result = $this->repository->delete($id);
            PersonDeletedEvent::dispatch($result);

            return $result;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
