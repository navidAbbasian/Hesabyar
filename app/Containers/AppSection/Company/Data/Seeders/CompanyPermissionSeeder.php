<?php

namespace App\Containers\AppSection\Company\Data\Seeders;

use App\Containers\AppSection\Authorization\Tasks\CreatePermissionTask;
use App\Ship\Parents\Seeders\Seeder as ParentSeeder;

class CompanyPermissionSeeder extends ParentSeeder
{
    public function run()
    {
        $createPermissionTask = app(CreatePermissionTask::class);
        foreach (array_keys(config('auth.guards')) as $guardName) {
            $createPermissionTask->run('search-companies', 'Find a Company in the DB.','صفحه شرکت ها', guardName: $guardName);
            $createPermissionTask->run('list-companies', 'Get All Company.','یست شرکت ها', guardName: $guardName);
            $createPermissionTask->run('update-companies', 'Update a Company.','بروزرسانی شرکت ها', guardName: $guardName);
            $createPermissionTask->run('delete-companies', 'Delete a Company.','حذف شرکت ها', guardName: $guardName);
            $createPermissionTask->run('create-companies', 'Create Company data.','ایجاد شرکت ها', guardName: $guardName);
        }
    }
}
