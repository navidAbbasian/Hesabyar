<?php

namespace App\Containers\AppSection\Unit\Data\Seeders;

use App\Containers\AppSection\Authorization\Tasks\CreatePermissionTask;
use App\Ship\Parents\Seeders\Seeder as ParentSeeder;

class UnitPermissionSeeder extends ParentSeeder
{
    public function run()
    {
        $createPermissionTask = app(CreatePermissionTask::class);
        foreach (array_keys(config('auth.guards')) as $guardName) {
            $createPermissionTask->run('search-units', 'Find a Unit in the DB.','صفحه واحد ها', guardName: $guardName);
            $createPermissionTask->run('list-units', 'Get All Unit.','لیست واحد ها', guardName: $guardName);
            $createPermissionTask->run('update-units', 'Update a Unit.','بروزرسانی واحد ها', guardName: $guardName);
            $createPermissionTask->run('delete-units', 'Delete a Unit.','حذف واحد ها', guardName: $guardName);
            $createPermissionTask->run('create-units', 'Create Unit data.','ایجاد واحد ها', guardName: $guardName);
        }
    }
}
