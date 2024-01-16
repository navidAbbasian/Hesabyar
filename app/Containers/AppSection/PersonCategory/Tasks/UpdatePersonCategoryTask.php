<?php

namespace App\Containers\AppSection\PersonCategory\Tasks;

use App\Containers\AppSection\PersonCategory\Data\Repositories\PersonCategoryRepository;
use App\Containers\AppSection\PersonCategory\Events\PersonCategoryUpdatedEvent;
use App\Containers\AppSection\PersonCategory\Models\PersonCategory;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdatePersonCategoryTask extends ParentTask
{
    public function __construct(
        protected PersonCategoryRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): PersonCategory
    {
        try {
            $personcategory = $this->repository->update($data, $id);
            PersonCategoryUpdatedEvent::dispatch($personcategory);

            return $personcategory;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
