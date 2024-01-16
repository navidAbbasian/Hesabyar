<?php

namespace App\Containers\AppSection\Supplier\Listeners;

use App\Containers\AppSection\Supplier\Events\SuppliersListedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class SuppliersListedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(SuppliersListedEvent $event): void
    {
        //
    }
}
