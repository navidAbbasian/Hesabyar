<?php

/**
 * @apiGroup           BuyProductFactorItem
 * @apiName            DeleteBuyProductFactorItem
 *
 * @api                {DELETE} /v1/buy-product-factor-items/:id Delete Buy Product Factor Item
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

Route::delete('buy-product-factor-items/{id}', [Controller::class, 'deleteBuyProductFactorItem'])
    ->middleware(['auth:api']);

