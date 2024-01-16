<?php

namespace App\Containers\AppSection\Bank\Listeners;

use App\Containers\AppSection\Bank\Events\BankDeletedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class BankDeletedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(BankDeletedEvent $event): void
    {
        //
    }
}
