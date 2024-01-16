<?php

namespace App\Containers\AppSection\Person\Tasks;

use App\Containers\AppSection\Person\Data\Repositories\PersonRepository;
use App\Containers\AppSection\Person\Events\PersonFoundByIdEvent;
use App\Containers\AppSection\Person\Models\Person;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindPersonByIdTask extends ParentTask
{
    public function __construct(
        protected PersonRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): Person
    {
        try {
            $person = $this->repository->withTrashed()->find($id);
            PersonFoundByIdEvent::dispatch($person);

            return $person;
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
