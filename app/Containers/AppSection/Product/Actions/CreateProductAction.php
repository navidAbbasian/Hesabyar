<?php

namespace App\Containers\AppSection\Product\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Product\Models\Product;
use App\Containers\AppSection\Product\Tasks\CreateProductTask;
use App\Containers\AppSection\Product\UI\API\Requests\CreateProductRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateProductAction extends ParentAction
{
    /**
     * @param CreateProductRequest $request
     * @return Product
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateProductRequest $request): Product
    {
        $data = $request->sanitizeInput([
            // add your request data here
            'name',
            'image',
            'code',
            'buy_price',
            'sale_price',
            'quantity',
            'status',
            'description',
            'type',
            'total_working_hours',
            'direct_working_rate',
            'continuous_material_rate',
            'total_materials_used',
            'indirect_cost_of_work',
            'indirect_cost_of_material',
            'other_costs',
            'product_category_id',
            'unit_id'
        ]);

        return app(CreateProductTask::class)->run($data);
    }
}
