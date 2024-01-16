<?php

namespace App\Containers\AppSection\SideIncomeCategory\Tasks;

use App\Containers\AppSection\SideIncomeCategory\Data\Repositories\SideIncomeCategoryRepository;
use App\Containers\AppSection\SideIncomeCategory\Events\SideIncomeCategoryFoundByIdEvent;
use App\Containers\AppSection\SideIncomeCategory\Models\SideIncomeCategory;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindSideIncomeCategoryByIdTask extends ParentTask
{
    public function __construct(
        protected SideIncomeCategoryRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): SideIncomeCategory
    {
        try {
            $sideincomecategory = $this->repository->withTrashed()->find($id);
            SideIncomeCategoryFoundByIdEvent::dispatch($sideincomecategory);

            return $sideincomecategory;
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
