<?php

namespace App\Containers\AppSection\Supplier\Listeners;

use App\Containers\AppSection\Supplier\Events\SupplierUpdatedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class SupplierUpdatedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(SupplierUpdatedEvent $event): void
    {
        //
    }
}
