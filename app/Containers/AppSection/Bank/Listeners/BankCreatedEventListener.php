<?php

namespace App\Containers\AppSection\Bank\Listeners;

use App\Containers\AppSection\Bank\Events\BankCreatedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class BankCreatedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(BankCreatedEvent $event): void
    {
        //
    }
}
