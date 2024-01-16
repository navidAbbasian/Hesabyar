<?php

namespace App\Containers\AppSection\SideIncome\Listeners;

use App\Containers\AppSection\SideIncome\Events\SideIncomeUpdatedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class SideIncomeUpdatedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(SideIncomeUpdatedEvent $event): void
    {
        //
    }
}
