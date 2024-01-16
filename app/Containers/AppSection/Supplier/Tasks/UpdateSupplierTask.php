<?php

namespace App\Containers\AppSection\Supplier\Tasks;

use App\Containers\AppSection\Supplier\Data\Repositories\SupplierRepository;
use App\Containers\AppSection\Supplier\Events\SupplierUpdatedEvent;
use App\Containers\AppSection\Supplier\Models\Supplier;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Storage;

class UpdateSupplierTask extends ParentTask
{
    public function __construct(
        protected SupplierRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): Supplier
    {
        try {

            $deleteImage = $this->repository->find($id);
            if (isset($data['logo']) && $data['logo'] != null && $deleteImage['image'] != null && Storage::disk('s3')->exists($deleteImage['logo'])) {
                Storage::disk('s3')->delete($deleteImage['logo']);
            }

            if (isset($data['logo']) && $data['logo'] != null) {
                $imageName = "images/" . time() . '.' . $data['logo']->extension();
                $fileContent = file_get_contents($data['logo']);
                Storage::disk('s3')->put($imageName, $fileContent);
                $data['logo'] = $imageName;
            }

            $supplier = $this->repository->update($data, $id);
            SupplierUpdatedEvent::dispatch($supplier);

            return $supplier;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
