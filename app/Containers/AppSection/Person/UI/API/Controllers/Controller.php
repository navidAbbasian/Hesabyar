<?php

namespace App\Containers\AppSection\Person\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Person\Actions\CreatePersonAction;
use App\Containers\AppSection\Person\Actions\DeletePersonAction;
use App\Containers\AppSection\Person\Actions\FindPersonByIdAction;
use App\Containers\AppSection\Person\Actions\GetAllPeopleAction;
use App\Containers\AppSection\Person\Actions\UpdatePersonAction;
use App\Containers\AppSection\Person\UI\API\Requests\CreatePersonRequest;
use App\Containers\AppSection\Person\UI\API\Requests\DeletePersonRequest;
use App\Containers\AppSection\Person\UI\API\Requests\FindPersonByIdRequest;
use App\Containers\AppSection\Person\UI\API\Requests\GetAllPeopleRequest;
use App\Containers\AppSection\Person\UI\API\Requests\UpdatePersonRequest;
use App\Containers\AppSection\Person\UI\API\Transformers\PersonTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use Prettus\Repository\Exceptions\RepositoryException;

class Controller extends ApiController
{
    /**
     * @param CreatePersonRequest $request
     * @return JsonResponse
     * @throws InvalidTransformerException
     * @throws CreateResourceFailedException
     */
    public function createPerson(CreatePersonRequest $request): JsonResponse
    {
        $person = app(CreatePersonAction::class)->run($request);

        return $this->created($this->transform($person, PersonTransformer::class));
    }

    /**
     * @param FindPersonByIdRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws NotFoundException
     */
    public function findPersonById(FindPersonByIdRequest $request): array
    {
        $person = app(FindPersonByIdAction::class)->run($request);

        return $this->transform($person, (new PersonTransformer())->setDefaultIncludes(['company','personCategory','chequePayments','buyProductFactors','sellProductFactors','transactions']));
    }

    /**
     * @param GetAllPeopleRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllPeople(GetAllPeopleRequest $request): array
    {
        $people = app(GetAllPeopleAction::class)->run($request);

        return $this->transform($people,(new PersonTransformer())->setDefaultIncludes(['company','personCategory','chequePayments','buyProductFactors','sellProductFactors','transactions']));
    }

    /**
     * @param UpdatePersonRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     */
    public function updatePerson(UpdatePersonRequest $request): array
    {
        $person = app(UpdatePersonAction::class)->run($request);

        return $this->transform($person, PersonTransformer::class);
    }

    /**
     * @param DeletePersonRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     */
    public function deletePerson(DeletePersonRequest $request): JsonResponse
    {
        app(DeletePersonAction::class)->run($request);

        return $this->noContent();
    }
}
