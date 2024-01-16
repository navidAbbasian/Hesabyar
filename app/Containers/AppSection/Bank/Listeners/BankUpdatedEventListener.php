<?php

namespace App\Containers\AppSection\Bank\Listeners;

use App\Containers\AppSection\Bank\Events\BankUpdatedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class BankUpdatedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(BankUpdatedEvent $event): void
    {
        //
    }
}
