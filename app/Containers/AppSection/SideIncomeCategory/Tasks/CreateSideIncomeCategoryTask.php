<?php

namespace App\Containers\AppSection\SideIncomeCategory\Tasks;

use App\Containers\AppSection\SideIncomeCategory\Data\Repositories\SideIncomeCategoryRepository;
use App\Containers\AppSection\SideIncomeCategory\Events\SideIncomeCategoryCreatedEvent;
use App\Containers\AppSection\SideIncomeCategory\Models\SideIncomeCategory;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateSideIncomeCategoryTask extends ParentTask
{
    public function __construct(
        protected SideIncomeCategoryRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): SideIncomeCategory
    {
        try {
            $sideincomecategory = $this->repository->create($data);
            SideIncomeCategoryCreatedEvent::dispatch($sideincomecategory);

            return $sideincomecategory;
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
