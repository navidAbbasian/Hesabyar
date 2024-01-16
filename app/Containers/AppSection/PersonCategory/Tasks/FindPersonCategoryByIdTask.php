<?php

namespace App\Containers\AppSection\PersonCategory\Tasks;

use App\Containers\AppSection\PersonCategory\Data\Repositories\PersonCategoryRepository;
use App\Containers\AppSection\PersonCategory\Events\PersonCategoryFoundByIdEvent;
use App\Containers\AppSection\PersonCategory\Models\PersonCategory;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindPersonCategoryByIdTask extends ParentTask
{
    public function __construct(
        protected PersonCategoryRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): PersonCategory
    {
        try {
            $personcategory = $this->repository->withTrashed()->find($id);
            PersonCategoryFoundByIdEvent::dispatch($personcategory);

            return $personcategory;
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
