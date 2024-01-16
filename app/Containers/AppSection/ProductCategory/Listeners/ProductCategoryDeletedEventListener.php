<?php

namespace App\Containers\AppSection\ProductCategory\Listeners;

use App\Containers\AppSection\ProductCategory\Events\ProductCategoryDeletedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProductCategoryDeletedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(ProductCategoryDeletedEvent $event): void
    {
        //
    }
}
