<?php

namespace App\Containers\AppSection\Seller\Listeners;

use App\Containers\AppSection\Seller\Events\SellerFoundByIdEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class SellerFoundByIdEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(SellerFoundByIdEvent $event): void
    {
        //
    }
}
