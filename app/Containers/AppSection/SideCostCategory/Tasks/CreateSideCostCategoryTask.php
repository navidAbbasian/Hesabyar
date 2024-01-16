<?php

namespace App\Containers\AppSection\SideCostCategory\Tasks;

use App\Containers\AppSection\SideCostCategory\Data\Repositories\SideCostCategoryRepository;
use App\Containers\AppSection\SideCostCategory\Events\SideCostCategoryCreatedEvent;
use App\Containers\AppSection\SideCostCategory\Models\SideCostCategory;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateSideCostCategoryTask extends ParentTask
{
    public function __construct(
        protected SideCostCategoryRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): SideCostCategory
    {
        try {
            $sidecostcategory = $this->repository->create($data);
            SideCostCategoryCreatedEvent::dispatch($sidecostcategory);

            return $sidecostcategory;
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
