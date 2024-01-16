<?php

namespace App\Containers\AppSection\SideIncome\UI\API\Transformers;

use App\Containers\AppSection\Person\UI\API\Transformers\PersonTransformer;
use App\Containers\AppSection\SideIncome\Models\SideIncome;
use App\Containers\AppSection\SideIncomeCategory\UI\API\Transformers\SideIncomeCategoryTransformer;
use App\Containers\AppSection\User\UI\API\Transformers\UserTransformer;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class SideIncomeTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [
        'sideIncomeCategory', 'person'/*, 'user'*/
    ];

    public function transform(SideIncome $sideincome): array
    {
        $response = [
            'object' => $sideincome->getResourceKey(),
            'id' => $sideincome->getHashedKey(),
            'payment_method' => $sideincome->payment_method ?? null,
            'title' => $sideincome->title,
            'amount' => $sideincome->amount,
            'description' => $sideincome->description,
            'date' => $sideincome->date,
            'user_name' => $sideincome->user->name ?? null,
            'user_id' => $sideincome->encode($sideincome->user_id) ?? null,
            'bank_name' => $sideincome->bank->name ?? null,
            'bank_id' => $sideincome->encode($sideincome->bank_id) ?? null,
            'fund_name' => $sideincome->fund->title ?? null,
            'fund_id' => $sideincome->encode($sideincome->fund_id) ?? null,
            'created_at' => $sideincome->created_at,
            'deleted_at' => $sideincome->deleted_at
        ];

        return $this->ifAdmin([
            'real_id' => $sideincome->id,
            'updated_at' => $sideincome->updated_at,
            'readable_created_at' => $sideincome->created_at->diffForHumans(),
            'readable_updated_at' => $sideincome->updated_at->diffForHumans(),
            // 'deleted_at' => $sideincome->deleted_at,
        ], $response);
    }

    public function includeSideIncomeCategory(SideIncome $sideIncome)
    {
        return $this->item($sideIncome->sideIncomeCategory, new SideIncomeCategoryTransformer());
    }

    public function includePerson(SideIncome $sideIncome)
    {
        return $this->item($sideIncome->person, new PersonTransformer());
    }

/*    public function includeUser(SideIncome $sideIncome)
    {
        if ($sideIncome->user_id != null) {
            return $this->item($sideIncome->user, new UserTransformer());
        } else {
            return;
        }
    }*/
}
