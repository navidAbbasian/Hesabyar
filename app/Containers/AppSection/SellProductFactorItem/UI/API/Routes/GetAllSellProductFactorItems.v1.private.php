<?php

/**
 * @apiGroup           SellProductFactorItem
 * @apiName            GetAllSellProductFactorItems
 *
 * @api                {GET} /v1/sell-product-factor-items Get All Sell Product Factor Items
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

Route::get('sell-product-factor-items', [Controller::class, 'getAllSellProductFactorItems'])
    ->middleware(['auth:api']);

