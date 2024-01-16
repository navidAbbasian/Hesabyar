<?php

namespace App\Containers\AppSection\ProductCategory\Listeners;

use App\Containers\AppSection\ProductCategory\Events\ProductCategoryUpdatedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProductCategoryUpdatedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(ProductCategoryUpdatedEvent $event): void
    {
        //
    }
}
