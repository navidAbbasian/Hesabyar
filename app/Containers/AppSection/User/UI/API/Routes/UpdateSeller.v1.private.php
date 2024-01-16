<?php

/**
 * @apiGroup           User
 * @apiName            Seller
 *
 * @api                {PATCH} /v1/ Seller
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

use App\Containers\AppSection\User\UI\API\Controllers\UpdateSellerController;
use Illuminate\Support\Facades\Route;

Route::patch('sellers/{id}', [UpdateSellerController::class, 'updateSeller'])
    ->middleware(['auth:api']);

