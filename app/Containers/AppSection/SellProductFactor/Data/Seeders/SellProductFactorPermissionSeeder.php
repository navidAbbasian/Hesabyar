<?php

namespace App\Containers\AppSection\SellProductFactor\Data\Seeders;

use App\Containers\AppSection\Authorization\Tasks\CreatePermissionTask;
use App\Ship\Parents\Seeders\Seeder as ParentSeeder;

class SellProductFactorPermissionSeeder extends ParentSeeder
{
    public function run()
    {
        $createPermissionTask = app(CreatePermissionTask::class);
        foreach (array_keys(config('auth.guards')) as $guardName) {
            $createPermissionTask->run('search-sellProductFactor', 'Find a SellProductFactor in the DB.','صفحه فاکتور فروش محصولات', guardName: $guardName);
            $createPermissionTask->run('list-sellProductFactor', 'Get All SellProductFactor.','لیست فاکتور فروش محصولات', guardName: $guardName);
            $createPermissionTask->run('update-sellProductFactor', 'Update a SellProductFactor.','بروزرسانی فاکتور فروش محصولات', guardName: $guardName);
            $createPermissionTask->run('delete-sellProductFactor', 'Delete a SellProductFactor.','حذف فاکتور فروش محصولات', guardName: $guardName);
            $createPermissionTask->run('create-sellProductFactor', 'Create SellProductFactor data.','ایجاد فاکتوز فروش محصولات', guardName: $guardName);
        }
    }
}
