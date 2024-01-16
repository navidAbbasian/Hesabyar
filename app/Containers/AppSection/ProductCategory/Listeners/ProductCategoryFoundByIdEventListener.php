<?php

namespace App\Containers\AppSection\ProductCategory\Listeners;

use App\Containers\AppSection\ProductCategory\Events\ProductCategoryFoundByIdEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProductCategoryFoundByIdEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(ProductCategoryFoundByIdEvent $event): void
    {
        //
    }
}
