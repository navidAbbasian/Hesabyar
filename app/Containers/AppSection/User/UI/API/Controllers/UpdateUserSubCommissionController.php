<?php

namespace App\Containers\AppSection\User\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\User\Actions\UpdateUserAction;
use App\Containers\AppSection\User\Actions\UpdateUserSubCommissionAction;
use App\Containers\AppSection\User\UI\API\Requests\UpdateUserRequest;
use App\Containers\AppSection\User\UI\API\Requests\UpdateUserSubCommissionRequest;
use App\Containers\AppSection\User\UI\API\Transformers\UserTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;

class UpdateUserSubCommissionController extends ApiController
{
    /**
     * @param UpdateUserSubCommissionRequest $request
     * @return array
     * @throws InvalidTransformerException
     */
    public function updateSubCommissionUser(UpdateUserSubCommissionRequest $request): array
    {
        $user = app(UpdateUserSubCommissionAction::class)->run($request);

        return $this->transform($user, UserTransformer::class);
    }
}
