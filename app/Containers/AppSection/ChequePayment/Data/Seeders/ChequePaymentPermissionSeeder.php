<?php

namespace App\Containers\AppSection\ChequePayment\Data\Seeders;

use App\Containers\AppSection\Authorization\Tasks\CreatePermissionTask;
use App\Ship\Parents\Seeders\Seeder as ParentSeeder;

class ChequePaymentPermissionSeeder extends ParentSeeder
{
    public function run()
    {
        $createPermissionTask = app(CreatePermissionTask::class);
        foreach (array_keys(config('auth.guards')) as $guardName) {
            $createPermissionTask->run('search-chequePayment', 'Find a ChequePayment in the DB.','صفحه چک های پرداختی', guardName: $guardName);
            $createPermissionTask->run('list-chequePayment', 'Get All ChequePayment.','لیست چک های پرداختی', guardName: $guardName);
            $createPermissionTask->run('update-chequePayment', 'Update a ChequePayment.','بروزرسانی چک های پرداختی', guardName: $guardName);
            $createPermissionTask->run('delete-chequePayment', 'Delete a ChequePayment.','حذف چک های پرداختی', guardName: $guardName);
            $createPermissionTask->run('create-chequePayment', 'Create ChequePayment data.','ایجاد چک های پرداختی', guardName: $guardName);
        }
    }
}
