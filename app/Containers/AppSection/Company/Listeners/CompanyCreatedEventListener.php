<?php

namespace App\Containers\AppSection\Company\Listeners;

use App\Containers\AppSection\Company\Events\CompanyCreatedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class CompanyCreatedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(CompanyCreatedEvent $event): void
    {
        //
    }
}
