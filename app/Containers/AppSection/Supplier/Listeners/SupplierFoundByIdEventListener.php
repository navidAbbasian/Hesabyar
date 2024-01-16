<?php

namespace App\Containers\AppSection\Supplier\Listeners;

use App\Containers\AppSection\Supplier\Events\SupplierFoundByIdEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class SupplierFoundByIdEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(SupplierFoundByIdEvent $event): void
    {
        //
    }
}
