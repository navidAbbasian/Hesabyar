<?php

namespace App\Containers\AppSection\Supplier\Listeners;

use App\Containers\AppSection\Supplier\Events\SupplierCreatedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class SupplierCreatedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(SupplierCreatedEvent $event): void
    {
        //
    }
}
