<?php

namespace App\Containers\AppSection\SellProductFactor\Traits;

use App\Containers\AppSection\SellProductFactor\Data\Repositories\SellProductFactorRepository;

trait IsResourceOwnerTrait
{
    public function __construct(
        protected SellProductFactorRepository $sellProductFactorRepository
    )
    {
    }

    public function isResourceOwner(): bool
    {
        $sellProductFactor = $this->sellProductFactorRepository->find($this->id);
        if ($sellProductFactor->user_id === auth()->id() || auth()->user()->can('manage-admins-access')) {
            return true;
        }
        return false;
    }
}
