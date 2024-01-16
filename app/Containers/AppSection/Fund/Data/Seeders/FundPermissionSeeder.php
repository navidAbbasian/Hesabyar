<?php

namespace App\Containers\AppSection\Fund\Data\Seeders;

use App\Containers\AppSection\Authorization\Tasks\CreatePermissionTask;
use App\Ship\Parents\Seeders\Seeder as ParentSeeder;

class FundPermissionSeeder extends ParentSeeder
{
    public function run()
    {
        $createPermissionTask = app(CreatePermissionTask::class);
        foreach (array_keys(config('auth.guards')) as $guardName) {
            $createPermissionTask->run('search-funds', 'Find a Fund in the DB.','صفحه صندوق ها', guardName: $guardName);
            $createPermissionTask->run('list-funds', 'Get All Fund.','لیست صندوق ها', guardName: $guardName);
            $createPermissionTask->run('update-funds', 'Update a Fund.','بروزرسانی صندوق ها', guardName: $guardName);
            $createPermissionTask->run('delete-funds', 'Delete a Fund.','حذف صندوق ها', guardName: $guardName);
            $createPermissionTask->run('create-funds', 'Create Fund data.','ایجاد صندوق ها', guardName: $guardName);
        }
    }
}
