<?php

namespace App\Containers\AppSection\SideCostCategory\Data\Seeders;

use App\Containers\AppSection\Authorization\Tasks\CreatePermissionTask;
use App\Ship\Parents\Seeders\Seeder as ParentSeeder;

class SideCostCategoryPermissionSeeder extends ParentSeeder
{
    public function run()
    {
        $createPermissionTask = app(CreatePermissionTask::class);
        foreach (array_keys(config('auth.guards')) as $guardName) {
            $createPermissionTask->run('search-sideCostCategory', 'Find a SideCostCategory in the DB.','صفحه دسته بندی هزینه جانبی', guardName: $guardName);
            $createPermissionTask->run('list-sideCostCategory', 'Get All SideCostCategory.','لیست دسته بندی هزینه جانبی', guardName: $guardName);
            $createPermissionTask->run('update-sideCostCategory', 'Update a SideCostCategory.','بروزرسانی دسته بندی هزینه جانبی', guardName: $guardName);
            $createPermissionTask->run('delete-sideCostCategory', 'Delete a SideCostCategory.','حذف دسته بندی هزینه جانبی', guardName: $guardName);
            $createPermissionTask->run('create-sideCostCategory', 'Create SideCostCategory data.','ایجاد دسته بندی هزینه جانبی', guardName: $guardName);
        }
    }
}
