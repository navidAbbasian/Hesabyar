<?php

namespace App\Containers\AppSection\User\Data\Seeders;

use App\Containers\AppSection\Authorization\Tasks\CreatePermissionTask;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Seeders\Seeder as ParentSeeder;

class UserPermissionsSeeder_1 extends ParentSeeder
{
    /**
     * @throws CreateResourceFailedException
     */
    public function run(): void
    {
        // Default Permissions for every Guard ----------------------------------------------------------
        $createPermissionTask = app(CreatePermissionTask::class);
        foreach (array_keys(config('auth.guards')) as $guardName) {
            $createPermissionTask->run('search-users', 'Find a User in the DB.','صفحه کاربران', guardName: $guardName);
            $createPermissionTask->run('list-users', 'Get All Users.','لیست کاربران', guardName: $guardName);
            $createPermissionTask->run('update-users', 'Update a User.','بروزرسانی کاربران', guardName: $guardName);
            $createPermissionTask->run('delete-users', 'Delete a User.','حذف کاربران', guardName: $guardName);
            $createPermissionTask->run('refresh-users', 'Refresh User data.','تازه سازی کاربران', guardName: $guardName);
            $createPermissionTask->run('create-users', 'Create User data.','ایجاد کاربران', guardName: $guardName);
            $createPermissionTask->run('edit-sellers', 'edit Seller data.','ویراریش فروشنده', guardName: $guardName);
            $createPermissionTask->run('set-sub-commission', 'set Sub Commission Sale Manager data.','تایین پورسانت برای مدیر فروش', guardName: $guardName);
        }
    }
}
