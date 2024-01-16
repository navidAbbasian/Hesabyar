<?php

namespace App\Containers\AppSection\SideIncome\Listeners;

use App\Containers\AppSection\SideIncome\Events\SideIncomesListedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class SideIncomesListedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(SideIncomesListedEvent $event): void
    {
        //
    }
}
