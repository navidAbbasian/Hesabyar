<?php

namespace App\Containers\AppSection\Bank\Listeners;

use App\Containers\AppSection\Bank\Events\BankFoundByIdEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class BankFoundByIdEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(BankFoundByIdEvent $event): void
    {
        //
    }
}
