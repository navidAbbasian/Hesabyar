<?php

namespace App\Containers\AppSection\SideIncomeCategory\Tasks;

use App\Containers\AppSection\SideIncomeCategory\Data\Repositories\SideIncomeCategoryRepository;
use App\Containers\AppSection\SideIncomeCategory\Events\SideIncomeCategoryUpdatedEvent;
use App\Containers\AppSection\SideIncomeCategory\Models\SideIncomeCategory;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateSideIncomeCategoryTask extends ParentTask
{
    public function __construct(
        protected SideIncomeCategoryRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): SideIncomeCategory
    {
        try {
            $sideincomecategory = $this->repository->update($data, $id);
            SideIncomeCategoryUpdatedEvent::dispatch($sideincomecategory);

            return $sideincomecategory;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
