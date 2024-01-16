<?php

/**
 * @apiGroup           BuyProductFactorItem
 * @apiName            CreateBuyProductFactorItem
 *
 * @api                {POST} /v1/buy-product-factor-items Create Buy Product Factor Item
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

use App\Containers\AppSection\BuyProductFactorItem\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::post('buy-product-factor-items', [Controller::class, 'createBuyProductFactorItem'])
    ->middleware(['auth:api']);

