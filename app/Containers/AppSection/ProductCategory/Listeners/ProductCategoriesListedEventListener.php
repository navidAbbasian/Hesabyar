<?php

namespace App\Containers\AppSection\ProductCategory\Listeners;

use App\Containers\AppSection\ProductCategory\Events\ProductCategoriesListedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProductCategoriesListedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(ProductCategoriesListedEvent $event): void
    {
        //
    }
}
