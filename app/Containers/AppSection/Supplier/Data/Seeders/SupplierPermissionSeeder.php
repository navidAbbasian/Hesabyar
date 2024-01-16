<?php

namespace App\Containers\AppSection\Supplier\Data\Seeders;

use App\Containers\AppSection\Authorization\Tasks\CreatePermissionTask;
use App\Ship\Parents\Seeders\Seeder as ParentSeeder;

class SupplierPermissionSeeder extends ParentSeeder
{
    public function run()
    {
        $createPermissionTask = app(CreatePermissionTask::class);
        foreach (array_keys(config('auth.guards')) as $guardName) {
            $createPermissionTask->run('search-supplier', 'Find a Supplier in the DB.','صفحه تامین کنندگان', guardName: $guardName);
            $createPermissionTask->run('list-supplier', 'Get All Supplier.','لیست تامین کنندگان', guardName: $guardName);
            $createPermissionTask->run('update-supplier', 'Update a Supplier.','بروزرسانی تامین کنندگان', guardName: $guardName);
            $createPermissionTask->run('delete-supplier', 'Delete a Supplier.','حذف تامین کنندگان', guardName: $guardName);
            $createPermissionTask->run('create-supplier', 'Create Supplier data.','ایجاد تامین کنندگان', guardName: $guardName);
        }
    }
}
