<?php

namespace App\Containers\AppSection\Company\Listeners;

use App\Containers\AppSection\Company\Events\CompanyFoundByIdEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class CompanyFoundByIdEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(CompanyFoundByIdEvent $event): void
    {
        //
    }
}
