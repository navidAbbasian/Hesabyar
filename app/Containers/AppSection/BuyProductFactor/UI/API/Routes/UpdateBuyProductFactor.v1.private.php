<?php

/**
 * @apiGroup           BuyProductFactor
 * @apiName            UpdateBuyProductFactor
 *
 * @api                {PATCH} /v1/buy-product-factors/:id Update Buy Product Factor
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

use App\Containers\AppSection\BuyProductFactor\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::patch('buy-product-factors/{id}', [Controller::class, 'updateBuyProductFactor'])
    ->middleware(['auth:api']);

