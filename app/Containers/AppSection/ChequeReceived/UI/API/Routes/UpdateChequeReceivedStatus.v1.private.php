<?php

/**
 * @apiGroup           ChequeReceived
 * @apiName            Status
 *
 * @api                {PATCH} /v1/ Status
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

use App\Containers\AppSection\ChequeReceived\UI\API\Controllers\UpdateChequeReceivedStatusController;
use Illuminate\Support\Facades\Route;

Route::patch('cheque-receiveds/status/{id}', [UpdateChequeReceivedStatusController::class, 'updateChequeReceivedStatus'])
    ->middleware(['auth:api']);

