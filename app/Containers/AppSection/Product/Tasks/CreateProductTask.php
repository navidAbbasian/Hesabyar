<?php

namespace App\Containers\AppSection\Product\Tasks;

use App\Containers\AppSection\Product\Data\Repositories\ProductRepository;
use App\Containers\AppSection\Product\Events\ProductCreatedEvent;
use App\Containers\AppSection\Product\Models\Product;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Support\Facades\Storage;

class CreateProductTask extends ParentTask
{
    public function __construct(
        protected ProductRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Product
    {
        try {
            if (isset($data['image'])){
                $imageName = "images/" . time() . '.' . $data['image']->extension();
                $fileContent = file_get_contents($data['image']);
                Storage::disk('s3')->put($imageName, $fileContent);
                $data['image'] = $imageName;
            }

            if ($data['type']){
                 $buyPrice = ( ($data['total_working_hours'] * $data['direct_working_rate']) +
                        ($data['continuous_material_rate'] * $data['total_materials_used']) +
                            ($data['indirect_cost_of_work'] + $data['indirect_cost_of_material'] + $data['other_costs']) )
                    / $data['quantity'] ;
            }else{
                unset($data['total_working_hours'],$data['direct_working_rate'],
                        $data['continuous_material_rate'],$data['total_materials_used'],
                            $data['indirect_cost_of_work'],$data['indirect_cost_of_material'],
                                $data['other_costs']);
                $buyPrice = $data['buy_price'];
            }
            $data['buy_price'] = $buyPrice;

            $product = $this->repository->create($data);
            ProductCreatedEvent::dispatch($product);

            return $product;
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
