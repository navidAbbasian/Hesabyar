<?php

namespace App\Containers\AppSection\SideCost\Data\Seeders;

use App\Containers\AppSection\Authorization\Tasks\CreatePermissionTask;
use App\Ship\Parents\Seeders\Seeder as ParentSeeder;

class SideCostPermissionSeeder extends ParentSeeder
{
    public function run()
    {
        $createPermissionTask = app(CreatePermissionTask::class);
        foreach (array_keys(config('auth.guards')) as $guardName) {
            $createPermissionTask->run('search-sideCost', 'Find a SideCost in the DB.','صفحه هزینه جانبی', guardName: $guardName);
            $createPermissionTask->run('list-sideCost', 'Get All SideCost.','لیست هزینه جانبی', guardName: $guardName);
            $createPermissionTask->run('update-sideCost', 'Update a SideCost.','بروزرسانی هزینه جانبی', guardName: $guardName);
            $createPermissionTask->run('delete-sideCost', 'Delete a SideCost.','حذف هزینه جانبی', guardName: $guardName);
            $createPermissionTask->run('create-sideCost', 'Create SideCost data.','ایجاد هزینه جانبی', guardName: $guardName);
        }
    }
}
