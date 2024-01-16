<?php

namespace App\Containers\AppSection\PersonCategory\Tasks;

use App\Containers\AppSection\PersonCategory\Data\Repositories\PersonCategoryRepository;
use App\Containers\AppSection\PersonCategory\Events\PersonCategoryCreatedEvent;
use App\Containers\AppSection\PersonCategory\Models\PersonCategory;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreatePersonCategoryTask extends ParentTask
{
    public function __construct(
        protected PersonCategoryRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): PersonCategory
    {
        try {
            $personcategory = $this->repository->create($data);
            PersonCategoryCreatedEvent::dispatch($personcategory);

            return $personcategory;
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
