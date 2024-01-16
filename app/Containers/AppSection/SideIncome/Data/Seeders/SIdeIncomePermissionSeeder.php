<?php

namespace App\Containers\AppSection\SideIncome\Data\Seeders;

use App\Containers\AppSection\Authorization\Tasks\CreatePermissionTask;
use App\Ship\Parents\Seeders\Seeder as ParentSeeder;

class SIdeIncomePermissionSeeder extends ParentSeeder
{
    public function run()
    {
        $createPermissionTask = app(CreatePermissionTask::class);
        foreach (array_keys(config('auth.guards')) as $guardName) {
            $createPermissionTask->run('search-sideIncome', 'Find a SideIncome in the DB.','صفحه درامد های جانبی', guardName: $guardName);
            $createPermissionTask->run('list-sideIncome', 'Get All SideIncome.','لیست درامد های جانبی', guardName: $guardName);
            $createPermissionTask->run('update-sideIncome', 'Update a SideIncome.','بروزرسانی درامد های جانبی', guardName: $guardName);
            $createPermissionTask->run('delete-sideIncome', 'Delete a SideIncome.','حذف درامد های جانبی', guardName: $guardName);
            $createPermissionTask->run('create-sideIncome', 'Create SideIncome data.','ایجاد درامد های جانبی', guardName: $guardName);
        }
    }
}
