<?php

namespace App\Containers\AppSection\BuyProductFactor\Data\Seeders;

use App\Containers\AppSection\Authorization\Tasks\CreatePermissionTask;
use App\Ship\Parents\Seeders\Seeder as ParentSeeder;

class BuyProductFactorPermissionSeeder extends ParentSeeder
{
    public function run()
    {
        $createPermissionTask = app(CreatePermissionTask::class);
        foreach (array_keys(config('auth.guards')) as $guardName) {
            $createPermissionTask->run('search-buyProductFactor', 'Find a BuyProductFactor in the DB.','صفحه فاکتور خربد محصول', guardName: $guardName);
            $createPermissionTask->run('list-buyProductFactor', 'Get All BuyProductFactor.','لیست فاکتورر های خرید محصول', guardName: $guardName);
            $createPermissionTask->run('update-buyProductFactor', 'Update a BuyProductFactor.','بروزرسانی فاکتورهای خرید محصول', guardName: $guardName);
            $createPermissionTask->run('delete-buyProductFactor', 'Delete a BuyProductFactor.','حذف فاکتورهای خرید محصول ', guardName: $guardName);
            $createPermissionTask->run('create-buyProductFactor', 'Create BuyProductFactor data.','ایجاد فاکتورهای خرید محصول', guardName: $guardName);
        }
    }
}

