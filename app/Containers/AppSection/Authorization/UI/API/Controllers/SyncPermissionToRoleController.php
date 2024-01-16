<?php

namespace App\Containers\AppSection\Authorization\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Authorization\Actions\SyncPermissionToRoleAction;
use App\Containers\AppSection\Authorization\Actions\UpdateAuthorizationAction;
use App\Containers\AppSection\Authorization\UI\API\Requests\SyncPermissionToRoleRequest;
use App\Containers\AppSection\Authorization\UI\API\Requests\UpdateAuthorizationRequest;
use App\Containers\AppSection\Authorization\UI\API\Transformers\AuthorizationTransformer;
use App\Containers\AppSection\Authorization\UI\API\Transformers\RoleTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;

class SyncPermissionToRoleController extends ApiController
{
    /**
     * @param SyncPermissionToRoleRequest $request
     * @return array
     * @throws InvalidTransformerException
     */
    public function updateAuthorization(SyncPermissionToRoleRequest $request): array
    {
        $authorization = app(SyncPermissionToRoleAction::class)->run($request);

        return $this->transform($authorization, RoleTransformer::class);
    }
}
