<?php

/**
 * @apiGroup           ChequePayment
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

use App\Containers\AppSection\ChequePayment\UI\API\Controllers\UpdateChequePaymentStatusController;
use Illuminate\Support\Facades\Route;

Route::patch('cheque-payments/status/{id}', [UpdateChequePaymentStatusController::class, 'updateChequePaymentStatus'])
    ->middleware(['auth:api']);

