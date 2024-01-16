<?php

namespace App\Containers\AppSection\Company\Listeners;

use App\Containers\AppSection\Company\Events\CompanyUpdatedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class CompanyUpdatedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(CompanyUpdatedEvent $event): void
    {
        //
    }
}
