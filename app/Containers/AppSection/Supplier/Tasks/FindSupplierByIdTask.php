<?php

namespace App\Containers\AppSection\Supplier\Tasks;

use App\Containers\AppSection\Supplier\Data\Repositories\SupplierRepository;
use App\Containers\AppSection\Supplier\Events\SupplierFoundByIdEvent;
use App\Containers\AppSection\Supplier\Models\Supplier;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindSupplierByIdTask extends ParentTask
{
    public function __construct(
        protected SupplierRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): Supplier
    {
        try {
            $supplier = $this->repository->withTrashed()->find($id);
            SupplierFoundByIdEvent::dispatch($supplier);

            return $supplier;
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
