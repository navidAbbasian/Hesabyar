<?php

namespace App\Containers\AppSection\ChequeReceived\Data\Seeders;

use App\Containers\AppSection\Authorization\Tasks\CreatePermissionTask;
use App\Ship\Parents\Seeders\Seeder as ParentSeeder;

class ChequeReceivedPermissionSeeder extends ParentSeeder
{
    public function run()
    {
        $createPermissionTask = app(CreatePermissionTask::class);
        foreach (array_keys(config('auth.guards')) as $guardName) {
            $createPermissionTask->run('search-chequeReceived', 'Find a ChequeReceived in the DB.','صفحه چک های دریافتی', guardName: $guardName);
            $createPermissionTask->run('list-chequeReceived', 'Get All ChequeReceived.','لیست چک های دریافتی', guardName: $guardName);
            $createPermissionTask->run('update-chequeReceived', 'Update a ChequeReceived.','بروزرسانی چک هلی دریافتی', guardName: $guardName);
            $createPermissionTask->run('delete-chequeReceived', 'Delete a ChequeReceived.','حذف چک های دریافتی', guardName: $guardName);
            $createPermissionTask->run('create-chequeReceived', 'Create ChequeReceived data.','ایجاد چک های دریافتی', guardName: $guardName);
        }
    }
}
