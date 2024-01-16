<?php

namespace App\Containers\AppSection\Fund\Listeners;

use App\Containers\AppSection\Fund\Events\FundCreatedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class FundCreatedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(FundCreatedEvent $event): void
    {
        //
    }
}
