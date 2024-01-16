<?php

/**
 * @apiGroup           Transaction
 * @apiName            UpdateTransaction
 *
 * @api                {PATCH} /v1/transactions/:id Update Transaction
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

use App\Containers\AppSection\Transaction\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::patch('transactions/{id}', [Controller::class, 'updateTransaction'])
    ->middleware(['auth:api']);

