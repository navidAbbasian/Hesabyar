<?php

namespace App\Containers\AppSection\FinancialReport\UI\API\Transformers;

use App\Containers\AppSection\FinancialReport\Models\FinancialReport;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class FinancialReportTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(FinancialReport $financialreport): array
    {
        $response = [
            'object' => $financialreport->getResourceKey(),
            'fund' => $financialreport->fund,
            'side_income' => $financialreport->side_income,
            'created_at' => $financialreport->created_at,
            'deleted_at' => $financialreport->deleted_at
        ];

        return $this->ifAdmin([
            'real_id' => $financialreport->id,
            'updated_at' => $financialreport->updated_at,
            'readable_created_at' => $financialreport->created_at->diffForHumans(),
            'readable_updated_at' => $financialreport->updated_at->diffForHumans(),
            // 'deleted_at' => $financialreport->deleted_at,
        ], $response);
    }
}
