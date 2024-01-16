<?php

namespace App\Containers\AppSection\Person\Data\Seeders;

use App\Containers\AppSection\Authorization\Tasks\CreatePermissionTask;
use App\Ship\Parents\Seeders\Seeder as ParentSeeder;

class PersonPermissionSeeder extends ParentSeeder
{
    public function run()
    {
        $createPermissionTask = app(CreatePermissionTask::class);
        foreach (array_keys(config('auth.guards')) as $guardName) {
            $createPermissionTask->run('search-persons', 'Find a Person in the DB.','صفحه طرف های حساب', guardName: $guardName);
            $createPermissionTask->run('list-persons', 'Get All Person.','لیست طرف های حساب', guardName: $guardName);
            $createPermissionTask->run('update-persons', 'Update a Person.','بروزرسانی طرف های حساب', guardName: $guardName);
            $createPermissionTask->run('delete-persons', 'Delete a Person.','حذف طرف های حساب', guardName: $guardName);
            $createPermissionTask->run('create-persons', 'Create Person data.','ایجاد طرف های حساب', guardName: $guardName);
        }
    }
}
