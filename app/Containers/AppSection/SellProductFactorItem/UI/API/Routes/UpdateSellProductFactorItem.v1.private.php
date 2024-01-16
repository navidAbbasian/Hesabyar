<?php

/**
 * @apiGroup           SellProductFactorItem
 * @apiName            UpdateSellProductFactorItem
 *
 * @api                {PATCH} /v1/sell-product-factor-items/:id Update Sell Product Factor Item
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

Route::patch('sell-product-factor-items/{id}', [Controller::class, 'updateSellProductFactorItem'])
    ->middleware(['auth:api']);

