<?php

namespace App\Containers\AppSection\PersonCategory\Data\Seeders;

use App\Containers\AppSection\Authorization\Tasks\CreatePermissionTask;
use App\Ship\Parents\Seeders\Seeder as ParentSeeder;

class PersonCategoryPermissionSeeder extends ParentSeeder
{
    public function run()
    {
        $createPermissionTask = app(CreatePermissionTask::class);
        foreach (array_keys(config('auth.guards')) as $guardName) {
            $createPermissionTask->run('search-personCategory', 'Find a PersonCategory in the DB.','صفحه دسته بندی طرف های حساب', guardName: $guardName);
            $createPermissionTask->run('list-personCategory', 'Get All PersonCategory.','لیست دسته بندی طرف های حساب', guardName: $guardName);
            $createPermissionTask->run('update-personCategory', 'Update a PersonCategory.','بروزرسانی دسته بندی طرف های حساب', guardName: $guardName);
            $createPermissionTask->run('delete-personCategory', 'Delete a PersonCategory.','حذف دسته بندی طرف های حساب', guardName: $guardName);
            $createPermissionTask->run('create-personCategory', 'Create PersonCategory data.','ایجاد دسته بندی طرف های حساب', guardName: $guardName);
        }
    }
}
