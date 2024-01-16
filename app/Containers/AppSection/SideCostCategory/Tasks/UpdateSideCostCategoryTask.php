<?php

namespace App\Containers\AppSection\SideCostCategory\Tasks;

use App\Containers\AppSection\SideCostCategory\Data\Repositories\SideCostCategoryRepository;
use App\Containers\AppSection\SideCostCategory\Events\SideCostCategoryUpdatedEvent;
use App\Containers\AppSection\SideCostCategory\Models\SideCostCategory;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateSideCostCategoryTask extends ParentTask
{
    public function __construct(
        protected SideCostCategoryRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): SideCostCategory
    {
        try {
            $sidecostcategory = $this->repository->update($data, $id);
            SideCostCategoryUpdatedEvent::dispatch($sidecostcategory);

            return $sidecostcategory;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
