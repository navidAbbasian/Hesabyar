<?php

namespace App\Containers\AppSection\ProductCategory\Listeners;

use App\Containers\AppSection\ProductCategory\Events\ProductCategoryCreatedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProductCategoryCreatedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(ProductCategoryCreatedEvent $event): void
    {
        //
    }
}
