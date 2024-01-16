<?php

namespace App\Containers\AppSection\Supplier\Tasks;

use App\Containers\AppSection\Supplier\Data\Repositories\SupplierRepository;
use App\Containers\AppSection\Supplier\Events\SupplierDeletedEvent;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Storage;

class DeleteSupplierTask extends ParentTask
{
    public function __construct(
        protected SupplierRepository $repository
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
            if ($deleteImage['image'] != null && Storage::disk('s3')->exists($deleteImage['logo'])) {
                Storage::disk('s3')->delete($deleteImage['logo']);
            }

            $result = $this->repository->delete($id);
            SupplierDeletedEvent::dispatch($result);

            return $result;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
