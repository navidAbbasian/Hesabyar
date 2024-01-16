<?php

namespace App\Containers\AppSection\Dashboard\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Dashboard\Actions\GetAllDashboardsAction;
use App\Containers\AppSection\Dashboard\UI\API\Requests\GetAllDashboardsRequest;
use App\Containers\AppSection\Dashboard\UI\API\Transformers\DashboardTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Prettus\Repository\Exceptions\RepositoryException;

class Controller extends ApiController
{

    /**
     * @param GetAllDashboardsRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllDashboards(GetAllDashboardsRequest $request): \Illuminate\Http\JsonResponse
    {
        $dashboards = app(GetAllDashboardsAction::class)->run($request);

        $result = [
            'data' =>   [$dashboards]
        ];

        return  response()->json($result,200);

//        return $this->transform($dashboards, DashboardTransformer::class);
    }

}
