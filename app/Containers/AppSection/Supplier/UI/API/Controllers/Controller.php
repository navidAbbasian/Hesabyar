<?php

namespace App\Containers\AppSection\Supplier\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Supplier\Actions\CreateSupplierAction;
use App\Containers\AppSection\Supplier\Actions\DeleteSupplierAction;
use App\Containers\AppSection\Supplier\Actions\FindSupplierByIdAction;
use App\Containers\AppSection\Supplier\Actions\GetAllSuppliersAction;
use App\Containers\AppSection\Supplier\Actions\UpdateSupplierAction;
use App\Containers\AppSection\Supplier\UI\API\Requests\CreateSupplierRequest;
use App\Containers\AppSection\Supplier\UI\API\Requests\DeleteSupplierRequest;
use App\Containers\AppSection\Supplier\UI\API\Requests\FindSupplierByIdRequest;
use App\Containers\AppSection\Supplier\UI\API\Requests\GetAllSuppliersRequest;
use App\Containers\AppSection\Supplier\UI\API\Requests\UpdateSupplierRequest;
use App\Containers\AppSection\Supplier\UI\API\Transformers\SupplierTransformer;
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
     * @param CreateSupplierRequest $request
     * @return JsonResponse
     * @throws InvalidTransformerException
     * @throws CreateResourceFailedException
     */
    public function createSupplier(CreateSupplierRequest $request): JsonResponse
    {
        $supplier = app(CreateSupplierAction::class)->run($request);

        return $this->created($this->transform($supplier, SupplierTransformer::class));
    }

    /**
     * @param FindSupplierByIdRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws NotFoundException
     */
    public function findSupplierById(FindSupplierByIdRequest $request): array
    {
        $supplier = app(FindSupplierByIdAction::class)->run($request);

        return $this->transform($supplier, SupplierTransformer::class);
    }

    /**
     * @param GetAllSuppliersRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllSuppliers(GetAllSuppliersRequest $request): array
    {
        $suppliers = app(GetAllSuppliersAction::class)->run($request);

        return $this->transform($suppliers, SupplierTransformer::class);
    }

    /**
     * @param UpdateSupplierRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     */
    public function updateSupplier(UpdateSupplierRequest $request): array
    {
        $supplier = app(UpdateSupplierAction::class)->run($request);

        return $this->transform($supplier, SupplierTransformer::class);
    }

    /**
     * @param DeleteSupplierRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     */
    public function deleteSupplier(DeleteSupplierRequest $request): JsonResponse
    {
        app(DeleteSupplierAction::class)->run($request);

        return $this->noContent();
    }
}
