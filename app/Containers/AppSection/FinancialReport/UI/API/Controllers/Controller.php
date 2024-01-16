<?php

namespace App\Containers\AppSection\FinancialReport\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\FinancialReport\Actions\GetAllFinancialReportsAction;
use App\Containers\AppSection\FinancialReport\UI\API\Requests\GetAllFinancialReportsRequest;
use App\Containers\AppSection\FinancialReport\UI\API\Transformers\FinancialReportTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Prettus\Repository\Exceptions\RepositoryException;

class Controller extends ApiController
{

    /**
     * @param GetAllFinancialReportsRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllFinancialReports(GetAllFinancialReportsRequest $request): \Illuminate\Http\JsonResponse
    {
        $financialreports = app(GetAllFinancialReportsAction::class)->run($request);

        $result = [
          'data' =>   [$financialreports]
        ];

        return response()->json($result,200);
//        return $this->transform($financialreports, FinancialReportTransformer::class);
    }


}
