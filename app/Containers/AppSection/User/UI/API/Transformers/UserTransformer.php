<?php

namespace App\Containers\AppSection\User\UI\API\Transformers;

use App\Containers\AppSection\Authorization\UI\API\Transformers\PermissionTransformer;
use App\Containers\AppSection\Authorization\UI\API\Transformers\RoleTransformer;
use App\Containers\AppSection\SellProductFactor\UI\API\Transformers\SellProductFactorTransformer;
use App\Containers\AppSection\SideIncome\UI\API\Transformers\SideIncomeTransformer;
use App\Containers\AppSection\User\Models\User;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;
use League\Fractal\Resource\Collection;

class UserTransformer extends ParentTransformer
{
    protected array $availableIncludes = [
        'roles',
        'permissions',
    ];

    protected array $defaultIncludes = [
        'sellProductFactors', 'sideIncomes', 'children'
    ];

    public function transform(User $user): array
    {
        $response = [
            'object' => $user->getResourceKey(),
            'id' => $user->getHashedKey(),
//            'balance' => $user->balance,
            'sumTotalSellerSales' => $user->sumTotalSellerSales,
            'sumTotalSellerSaleOfSaleManager' => $user->sumTotalSellerSaleOfSaleManager,
            'commissionAmount' => $user->commissionAmount,
            'subCommissionAmount' => $user->subCommissionAmount,
            'commissionAndSubCommission' => (isset($user->parent->name)) ? null : $user->commissionAndSubCommission,
            'name' => $user->name,
            'email' => $user->email,
            'image' => $user->image,
            'email_verified_at' => $user->email_verified_at,
            'gender' => $user->gender,
            'birth' => $user->birth,
            'commission' => $user->commission,
            'sub_commission' => $user->sub_commission,
            'description' => $user->description,
            'type' => $user->type,
            'parent_name' => $user->parent->name ?? null,
            'parent_id' => $user->parent_id ? $user->encode($user->parent_id) : null,
            'created_at' => $user->created_at,
            'deleted_at' => $user->deleted_at
        ];
        return $this->ifAdmin([
            'real_id' => $user->id,
            'updated_at' => $user->updated_at,
            'readable_created_at' => $user->created_at->diffForHumans(),
            'readable_updated_at' => $user->updated_at->diffForHumans(),
        ], $response);
    }

    public function includeRoles(User $user): Collection
    {
        return $this->collection($user->roles, new RoleTransformer());
    }

    public function includePermissions(User $user): Collection
    {
        return $this->collection($user->permissions, new PermissionTransformer());
    }

    public function includeSellProductFactors(User $user)
    {
        if ($user->sellProductFactors != null) {
            return $this->collection($user->sellProductFactors, new SellProductFactorTransformer());
        } else {
            return;
        }
    }

    public function includeSideIncomes(User $user)
    {
        if ($user->sideIncomes != null) {
            return $this->collection($user->sideIncomes, new SideIncomeTransformer());
        } else {
            return;
        }
    }

    public function includeChildren(User $user)
    {
        if ($user->children != null) {
            return $this->collection($user->children, new UserTransformer());
        } else {
            return;
        }
    }

    public function includeParent(User $user)
    {
        if ($user->parent != null) {
            return $this->item($user->parent, new UserTransformer());
        } else {
            return;
        }
    }
}
