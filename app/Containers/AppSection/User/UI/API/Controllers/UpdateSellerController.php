<?php

namespace App\Containers\AppSection\User\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\User\Actions\UpdateSellerAction;
use App\Containers\AppSection\User\Actions\UpdateUserAction;
use App\Containers\AppSection\User\UI\API\Requests\UpdateSellerRequest;
use App\Containers\AppSection\User\UI\API\Requests\UpdateUserRequest;
use App\Containers\AppSection\User\UI\API\Transformers\UserTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;

class UpdateSellerController extends ApiController
{
    /**
     * @param UpdateUserRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function updateSeller(UpdateSellerRequest $request): array
    {
        $user = app(UpdateSellerAction::class)->run($request);

        return $this->transform($user, UserTransformer::class);
    }
}
