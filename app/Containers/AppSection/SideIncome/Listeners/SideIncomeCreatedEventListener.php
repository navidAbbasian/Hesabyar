<?php

namespace App\Containers\AppSection\SideIncome\Listeners;

use App\Containers\AppSection\SideIncome\Events\SideIncomeCreatedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class SideIncomeCreatedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(SideIncomeCreatedEvent $event): void
    {
        //
    }
}
