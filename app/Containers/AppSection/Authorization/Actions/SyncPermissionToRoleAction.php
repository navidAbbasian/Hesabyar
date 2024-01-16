<?php

namespace App\Containers\AppSection\Authorization\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Authorization\Models\Role;
use App\Containers\AppSection\Authorization\Tasks\DetachPermissionsFromRoleTask;
use App\Containers\AppSection\Authorization\Tasks\FindPermissionTask;
use App\Containers\AppSection\Authorization\Tasks\FindRoleTask;
use App\Containers\AppSection\Authorization\UI\API\Requests\SyncPermissionToRoleRequest;
use App\Ship\Parents\Actions\Action as ParentAction;

class SyncPermissionToRoleAction extends ParentAction
{
    /**
     * @param SyncPermissionToRoleRequest $request
     * @return Role
     * @throws IncorrectIdException
     */
    public function run(SyncPermissionToRoleRequest $request): Role
    {

        $role = app(FindRoleTask::class)->run($request->role_id);

        $permissionIds = (array)$request->permissions_ids;

        $permissions = array_map(static function ($permissionId) {
            return app(FindPermissionTask::class)->run($permissionId);
        }, $permissionIds);

         app(DetachPermissionsFromRoleTask::class)->run($role, array_column($role->permissions->toArray(),'id'));

        return $role->givePermissionTo($permissions);

    }
}
