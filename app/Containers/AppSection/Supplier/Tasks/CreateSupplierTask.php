<?php

namespace App\Containers\AppSection\Supplier\Tasks;

use App\Containers\AppSection\Supplier\Data\Repositories\SupplierRepository;
use App\Containers\AppSection\Supplier\Events\SupplierCreatedEvent;
use App\Containers\AppSection\Supplier\Models\Supplier;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Support\Facades\Storage;

class CreateSupplierTask extends ParentTask
{
    public function __construct(
        protected SupplierRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Supplier
    {
        try {
            if (isset($data['logo'])){
                $imageName = "images/" . time() . '.' . $data['logo']->extension();
                $fileContent = file_get_contents($data['logo']);
                Storage::disk('s3')->put($imageName, $fileContent);
                $data['logo'] = $imageName;
            }

            $supplier = $this->repository->create($data);
            SupplierCreatedEvent::dispatch($supplier);

            return $supplier;
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
