<?php

namespace App\Containers\AppSection\SideIncome\Listeners;

use App\Containers\AppSection\SideIncome\Events\SideIncomeDeletedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class SideIncomeDeletedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(SideIncomeDeletedEvent $event): void
    {
        //
    }
}
