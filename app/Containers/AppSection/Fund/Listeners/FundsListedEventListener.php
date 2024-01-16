<?php

namespace App\Containers\AppSection\Fund\Listeners;

use App\Containers\AppSection\Fund\Events\FundsListedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class FundsListedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(FundsListedEvent $event): void
    {
        //
    }
}
