<?php

namespace App\Containers\AppSection\Product\Data\Seeders;

use App\Containers\AppSection\Authorization\Tasks\CreatePermissionTask;
use App\Ship\Parents\Seeders\Seeder as ParentSeeder;

class ProductPermissionSeeder extends ParentSeeder
{
    public function run()
    {
        $createPermissionTask = app(CreatePermissionTask::class);
        foreach (array_keys(config('auth.guards')) as $guardName) {
            $createPermissionTask->run('search-products', 'Find a Product in the DB.','صفحه محصولات', guardName: $guardName);
            $createPermissionTask->run('list-products', 'Get All Product.','لیست محصولات', guardName: $guardName);
            $createPermissionTask->run('update-products', 'Update a Product.','بروزرسانی محصولات', guardName: $guardName);
            $createPermissionTask->run('delete-products', 'Delete a Product.','حذف محصولات', guardName: $guardName);
            $createPermissionTask->run('create-products', 'Create Product data.','ایجاد محصولات', guardName: $guardName);
        }
    }
}
