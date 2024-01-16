<?php

namespace App\Containers\AppSection\Seller\Listeners;

use App\Containers\AppSection\Seller\Events\SellersListedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class SellersListedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(SellersListedEvent $event): void
    {
        //
    }
}
