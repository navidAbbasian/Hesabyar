<?php

namespace App\Containers\AppSection\Supplier\Listeners;

use App\Containers\AppSection\Supplier\Events\SupplierDeletedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class SupplierDeletedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(SupplierDeletedEvent $event): void
    {
        //
    }
}
