<?php

namespace App\Containers\AppSection\SideCost\UI\API\Transformers;

use App\Containers\AppSection\Person\UI\API\Transformers\PersonTransformer;
use App\Containers\AppSection\SideCost\Models\SideCost;
use App\Containers\AppSection\SideCostCategory\UI\API\Transformers\SideCostCategoryTransformer;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class SideCostTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [
        'sideCostCategory','person'
    ];

    public function transform(SideCost $sidecost): array
    {
        $response = [
            'object' => $sidecost->getResourceKey(),
            'id' => $sidecost->getHashedKey(),
            'payment_method' => $sidecost->payment_method ?? null,
            'title'=>$sidecost->title,
            'amount'=>$sidecost->amount,
            'description'=>$sidecost->description,
            'date'=>$sidecost->date,
            'side_cost_category_id' => $sidecost->side_cost_category_id,
            'bank_id' => $sidecost->encode($sidecost->bank_id) ?? null,
            'bank_name' => $sidecost->bank->name ?? null,
            'fund_id' => $sidecost->encode($sidecost->fund_id) ?? null,
            'fund_name' => $sidecost->fund->title ?? null,
            'created_at' => $sidecost->created_at,
            'deleted_at' => $sidecost->deleted_at
        ];

        return $this->ifAdmin([
            'real_id' => $sidecost->id,
            'updated_at' => $sidecost->updated_at,
            'readable_created_at' => $sidecost->created_at->diffForHumans(),
            'readable_updated_at' => $sidecost->updated_at->diffForHumans(),
            // 'deleted_at' => $sidecost->deleted_at,
        ], $response);
    }
    public function includeSideCostCategory(SideCost $sideCost)
    {
        if ($sideCost->sideCostCategory){
            return $this->item($sideCost->sideCostCategory, new SideCostCategoryTransformer());

        }else{
            return ;
        }
    }
    public function includePerson(SideCost $sideCost)
    {
        if($sideCost->person){

        return $this->item($sideCost->person, new PersonTransformer());
        }else{
            return ;
        }
    }
}
