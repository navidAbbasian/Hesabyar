<?php

namespace App\Containers\AppSection\Fund\Listeners;

use App\Containers\AppSection\Fund\Events\FundUpdatedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class FundUpdatedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(FundUpdatedEvent $event): void
    {
        //
    }
}
