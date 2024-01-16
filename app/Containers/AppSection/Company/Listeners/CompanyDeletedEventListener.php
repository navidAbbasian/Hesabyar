<?php

namespace App\Containers\AppSection\Company\Listeners;

use App\Containers\AppSection\Company\Events\CompanyDeletedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class CompanyDeletedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(CompanyDeletedEvent $event): void
    {
        //
    }
}
