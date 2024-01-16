<?php

namespace App\Containers\AppSection\SideCostCategory\Tasks;

use App\Containers\AppSection\SideCostCategory\Data\Repositories\SideCostCategoryRepository;
use App\Containers\AppSection\SideCostCategory\Events\SideCostCategoryFoundByIdEvent;
use App\Containers\AppSection\SideCostCategory\Models\SideCostCategory;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindSideCostCategoryByIdTask extends ParentTask
{
    public function __construct(
        protected SideCostCategoryRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): SideCostCategory
    {
        try {
            $sidecostcategory = $this->repository->withTrashed()->find($id);
            SideCostCategoryFoundByIdEvent::dispatch($sidecostcategory);

            return $sidecostcategory;
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
