<?php

namespace App\Containers\AppSection\Company\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Company\Actions\CreateCompanyAction;
use App\Containers\AppSection\Company\Actions\DeleteCompanyAction;
use App\Containers\AppSection\Company\Actions\FindCompanyByIdAction;
use App\Containers\AppSection\Company\Actions\GetAllCompaniesAction;
use App\Containers\AppSection\Company\Actions\UpdateCompanyAction;
use App\Containers\AppSection\Company\UI\API\Requests\CreateCompanyRequest;
use App\Containers\AppSection\Company\UI\API\Requests\DeleteCompanyRequest;
use App\Containers\AppSection\Company\UI\API\Requests\FindCompanyByIdRequest;
use App\Containers\AppSection\Company\UI\API\Requests\GetAllCompaniesRequest;
use App\Containers\AppSection\Company\UI\API\Requests\UpdateCompanyRequest;
use App\Containers\AppSection\Company\UI\API\Transformers\CompanyTransformer;
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
     * @param CreateCompanyRequest $request
     * @return JsonResponse
     * @throws InvalidTransformerException
     * @throws CreateResourceFailedException
     */
    public function createCompany(CreateCompanyRequest $request): JsonResponse
    {
        $company = app(CreateCompanyAction::class)->run($request);

        return $this->created($this->transform($company, CompanyTransformer::class));
    }

    /**
     * @param FindCompanyByIdRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws NotFoundException
     */
    public function findCompanyById(FindCompanyByIdRequest $request): array
    {
        $company = app(FindCompanyByIdAction::class)->run($request);

        return $this->transform($company,(new CompanyTransformer())->setDefaultIncludes(['persons']));
    }

    /**
     * @param GetAllCompaniesRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllCompanies(GetAllCompaniesRequest $request): array
    {
        $companies = app(GetAllCompaniesAction::class)->run($request);

        return $this->transform($companies,(new CompanyTransformer())->setDefaultIncludes(['persons']));
    }

    /**
     * @param UpdateCompanyRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     */
    public function updateCompany(UpdateCompanyRequest $request): array
    {
        $company = app(UpdateCompanyAction::class)->run($request);

        return $this->transform($company, CompanyTransformer::class);
    }

    /**
     * @param DeleteCompanyRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     */
    public function deleteCompany(DeleteCompanyRequest $request): JsonResponse
    {
        app(DeleteCompanyAction::class)->run($request);

        return $this->noContent();
    }
}
