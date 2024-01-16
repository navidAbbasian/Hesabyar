<?php

namespace App\Containers\AppSection\Authorization\Data\Seeders;

use App\Containers\AppSection\Authorization\Tasks\CreatePermissionTask;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Seeders\Seeder as ParentSeeder;

class AuthorizationPermissionsSeeder_1 extends ParentSeeder
{
    /**
     * @throws CreateResourceFailedException
     */
    public function run(): void
    {
        // Default Permissions for every Guard ----------------------------------------------------------
        $createPermissionTask = app(CreatePermissionTask::class);
        foreach (array_keys(config('auth.guards')) as $guardName) {
            $createPermissionTask->run('manage-roles','Create, Update, Delete, Get All, Attach/detach permissions to Roles and Get All Permissions.', 'مدیریت نقش ها', guardName: $guardName);
            $createPermissionTask->run('manage-permissions', 'Create, Update, Delete, Get All, Attach/detach permissions to User.','مدیریت دسترسی ها', guardName: $guardName);
            $createPermissionTask->run('create-admins', 'Create new Users (Admins) from the dashboard.','ایجاد ادمین', guardName: $guardName);
            $createPermissionTask->run('manage-admins-access', 'Assign users to Roles.','دسترسی به مدیریت ادمین(سوپر ادمین)', guardName: $guardName);
            $createPermissionTask->run('access-dashboard', 'Access the admins dashboard.','دسترسی به داشبورد', guardName: $guardName);
            $createPermissionTask->run('access-private-docs', 'Access the private docs.','دسترسی به مستندات خصوصی', guardName: $guardName);
        }
    }
}
