<?php

namespace App\Containers\AppSection\Bank\Data\Seeders;

use App\Containers\AppSection\Authorization\Tasks\CreatePermissionTask;
use App\Ship\Parents\Seeders\Seeder as ParentSeeder;

class BankPermissionSeeder extends ParentSeeder
{
    public function run()
    {
        $createPermissionTask = app(CreatePermissionTask::class);
        foreach (array_keys(config('auth.guards')) as $guardName) {
            $createPermissionTask->run('search-banks', 'Find a Bank in the DB.','صفحه بانک ها', guardName: $guardName);
            $createPermissionTask->run('list-banks', 'Get All Bank.','لیست بانک ها', guardName: $guardName);
            $createPermissionTask->run('update-banks', 'Update a Bank.','بروزرسانی بانک ها', guardName: $guardName);
            $createPermissionTask->run('delete-banks', 'Delete a Bank.','حذف بانک ها', guardName: $guardName);
            $createPermissionTask->run('create-banks', 'Create Bank data.','ایجاد بانک ها', guardName: $guardName);
        }
    }
}
