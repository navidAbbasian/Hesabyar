<?php

namespace App\Containers\AppSection\Fund\Listeners;

use App\Containers\AppSection\Fund\Events\FundDeletedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class FundDeletedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(FundDeletedEvent $event): void
    {
        //
    }
}
