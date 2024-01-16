<?php

namespace App\Containers\AppSection\SideIncome\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\SideIncome\Actions\CreateSideIncomeAction;
use App\Containers\AppSection\SideIncome\Actions\DeleteSideIncomeAction;
use App\Containers\AppSection\SideIncome\Actions\FindSideIncomeByIdAction;
use App\Containers\AppSection\SideIncome\Actions\GetAllSideIncomesAction;
use App\Containers\AppSection\SideIncome\Actions\UpdateSideIncomeAction;
use App\Containers\AppSection\SideIncome\UI\API\Requests\CreateSideIncomeRequest;
use App\Containers\AppSection\SideIncome\UI\API\Requests\DeleteSideIncomeRequest;
use App\Containers\AppSection\SideIncome\UI\API\Requests\FindSideIncomeByIdRequest;
use App\Containers\AppSection\SideIncome\UI\API\Requests\GetAllSideIncomesRequest;
use App\Containers\AppSection\SideIncome\UI\API\Requests\UpdateSideIncomeRequest;
use App\Containers\AppSection\SideIncome\UI\API\Transformers\SideIncomeTransformer;
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
     * @param CreateSideIncomeRequest $request
     * @return JsonResponse
     * @throws InvalidTransformerException
     * @throws CreateResourceFailedException
     */
    public function createSideIncome(CreateSideIncomeRequest $request): JsonResponse
    {
        $sideincome = app(CreateSideIncomeAction::class)->run($request);

        return $this->created($this->transform($sideincome, SideIncomeTransformer::class));
    }

    /**
     * @param FindSideIncomeByIdRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws NotFoundException
     */
    public function findSideIncomeById(FindSideIncomeByIdRequest $request): array
    {
        $sideincome = app(FindSideIncomeByIdAction::class)->run($request);

        return $this->transform($sideincome,(new SideIncomeTransformer())->setDefaultIncludes(['sideIncomeCategory','person'/*,'user'*/]));
    }

    /**
     * @param GetAllSideIncomesRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllSideIncomes(GetAllSideIncomesRequest $request): array
    {
        $sideincomes = app(GetAllSideIncomesAction::class)->run($request);

        return $this->transform($sideincomes,(new SideIncomeTransformer())->setDefaultIncludes(['sideIncomeCategory','person'/*,'user'*/]));
    }

    /**
     * @param UpdateSideIncomeRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     */
    public function updateSideIncome(UpdateSideIncomeRequest $request): array
    {
        $sideincome = app(UpdateSideIncomeAction::class)->run($request);

        return $this->transform($sideincome, SideIncomeTransformer::class);
    }

    /**
     * @param DeleteSideIncomeRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     */
    public function deleteSideIncome(DeleteSideIncomeRequest $request): JsonResponse
    {
        app(DeleteSideIncomeAction::class)->run($request);

        return $this->noContent();
    }
}
