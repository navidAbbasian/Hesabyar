<?php

namespace App\Containers\AppSection\SideIncomeCategory\Data\Seeders;

use App\Containers\AppSection\Authorization\Tasks\CreatePermissionTask;
use App\Ship\Parents\Seeders\Seeder as ParentSeeder;

class SideIncomeCategoryPermissionSeeder extends ParentSeeder
{
    public function run()
    {
        $createPermissionTask = app(CreatePermissionTask::class);
        foreach (array_keys(config('auth.guards')) as $guardName) {
            $createPermissionTask->run('search-sideIncomeCategory', 'Find a SideIncomeCategory in the DB.','صفحه دسته بندی هزینه های جانبی', guardName: $guardName);
            $createPermissionTask->run('list-sideIncomeCategory', 'Get All SideIncomeCategory.','لیست دسته بندی درامد های جانبی', guardName: $guardName);
            $createPermissionTask->run('update-sideIncomeCategory', 'Update a SideIncomeCategory.','بروزرسانی دسته بندی درامد های جانبی', guardName: $guardName);
            $createPermissionTask->run('delete-sideIncomeCategory', 'Delete a SideIncomeCategory.','حذف دسته بندی درامد های جانبی', guardName: $guardName);
            $createPermissionTask->run('create-sideIncomeCategory', 'Create SideIncomeCategory data.','ایجاد دسته بندی درامد های جانبی', guardName: $guardName);
        }
    }
}
