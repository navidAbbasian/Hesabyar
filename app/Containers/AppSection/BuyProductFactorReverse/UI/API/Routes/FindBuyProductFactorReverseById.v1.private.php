<?php

/**
 * @apiGroup           BuyProductFactorReverse
 * @apiName            FindBuyProductFactorReverseById
 *
 * @api                {GET} /v1/buy-product-factor-reverses/:id Find Buy Product Factor Reverse By Id
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

use App\Containers\AppSection\BuyProductFactorReverse\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::get('buy-product-factor-reverses/{id}', [Controller::class, 'findBuyProductFactorReverseById'])
    /*->middleware(['auth:api'])*/;

