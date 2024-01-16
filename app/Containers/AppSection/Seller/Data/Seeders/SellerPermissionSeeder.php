<?php

namespace App\Containers\AppSection\Seller\Data\Seeders;

use App\Containers\AppSection\Authorization\Tasks\CreatePermissionTask;
use App\Ship\Parents\Seeders\Seeder as ParentSeeder;

class SellerPermissionSeeder extends ParentSeeder
{
    public function run()
    {
        $createPermissionTask = app(CreatePermissionTask::class);
        foreach (array_keys(config('auth.guards')) as $guardName) {
            $createPermissionTask->run('search-sellers', 'Find a Seller in the DB.','صفحه فروشندگان', guardName: $guardName);
            $createPermissionTask->run('list-sellers', 'Get All Seller.','لیست فروشندگان', guardName: $guardName);
            $createPermissionTask->run('update-sellers', 'Update a Seller.','بروزرسانی فروشندگان', guardName: $guardName);
            $createPermissionTask->run('delete-sellers', 'Delete a Seller.','حذف فروشندگان', guardName: $guardName);
            $createPermissionTask->run('create-sellers', 'Create Seller data.','ایجاد فروشندگان', guardName: $guardName);
        }
    }
}
