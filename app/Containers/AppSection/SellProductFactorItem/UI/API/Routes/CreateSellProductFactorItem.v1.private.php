<?php

/**
 * @apiGroup           SellProductFactorItem
 * @apiName            CreateSellProductFactorItem
 *
 * @api                {POST} /v1/sell-product-factor-items Create Sell Product Factor Item
 * @apiDescription     Endpoint description here...
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader          {String} accept=application/json
 * @apiHeader          {String} authorization=Bearer
 *
 * @apiParam           {String} parameters here...
 *
 * @apiSuccessExample  {json} Success-Response:
 * HTTP/1.1 200 OK
 * {
 *     // Insert the response of the request here...
 * }
 */

use App\Containers\AppSection\SellProductFactorItem\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::post('sell-product-factor-items', [Controller::class, 'createSellProductFactorItem'])
    ->middleware(['auth:api']);

