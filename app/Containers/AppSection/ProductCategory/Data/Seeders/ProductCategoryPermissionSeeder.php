<?php

namespace App\Containers\AppSection\ProductCategory\Data\Seeders;

use App\Containers\AppSection\Authorization\Tasks\CreatePermissionTask;
use App\Ship\Parents\Seeders\Seeder as ParentSeeder;

class ProductCategoryPermissionSeeder extends ParentSeeder
{
    public function run()
    {
        $createPermissionTask = app(CreatePermissionTask::class);
        foreach (array_keys(config('auth.guards')) as $guardName) {
            $createPermissionTask->run('search-productCategory', 'Find a ProductCategory in the DB.','صفحه دسته بندی محصولات', guardName: $guardName);
            $createPermissionTask->run('list-productCategory', 'Get All ProductCategory.','لیست دسته بندی محصولات', guardName: $guardName);
            $createPermissionTask->run('update-productCategory', 'Update a ProductCategory.','بروزرسانی دسته بندی محصولات', guardName: $guardName);
            $createPermissionTask->run('delete-productCategory', 'Delete a ProductCategory.','حذف دسته بندی محصولات', guardName: $guardName);
            $createPermissionTask->run('create-productCategory', 'Create ProductCategory data.','ایجاد دسته بندی محصولات', guardName: $guardName);
        }
    }
}
