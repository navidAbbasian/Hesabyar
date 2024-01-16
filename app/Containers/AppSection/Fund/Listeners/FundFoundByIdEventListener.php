<?php

namespace App\Containers\AppSection\Fund\Listeners;

use App\Containers\AppSection\Fund\Events\FundFoundByIdEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class FundFoundByIdEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(FundFoundByIdEvent $event): void
    {
        //
    }
}
