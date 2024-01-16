<?php

namespace App\Containers\AppSection\Bank\Listeners;

use App\Containers\AppSection\Bank\Events\BanksListedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class BanksListedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(BanksListedEvent $event): void
    {
        //
    }
}
