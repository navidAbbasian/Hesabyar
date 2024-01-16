<?php

/**
 * @apiGroup           SellProductFactorReverse
 * @apiName            FindSellProductFactorReverseById
 *
 * @api                {GET} /v1/sell-product-factor-reverses/:id Find Sell Product Factor Reverse By Id
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

use App\Containers\AppSection\SellProductFactorReverse\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::get('sell-product-factor-reverses/{id}', [Controller::class, 'findSellProductFactorReverseById'])
    /*->middleware(['auth:api'])*/;

