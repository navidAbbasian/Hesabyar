<?php

namespace App\Containers\AppSection\SideIncome\Listeners;

use App\Containers\AppSection\SideIncome\Events\SideIncomeFoundByIdEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class SideIncomeFoundByIdEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(SideIncomeFoundByIdEvent $event): void
    {
        //
    }
}
