<?php

namespace App\Containers\AppSection\Company\Listeners;

use App\Containers\AppSection\Company\Events\CompaniesListedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class CompaniesListedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(CompaniesListedEvent $event): void
    {
        //
    }
}
