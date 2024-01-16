<?php

/**
 * @apiGroup           ChequePayment
 * @apiName            FindChequePaymentById
 *
 * @api                {GET} /v1/cheque-payments/:id Find Cheque Payment By Id
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

use App\Containers\AppSection\ChequePayment\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::get('cheque-payments/{id}', [Controller::class, 'findChequePaymentById'])
    ->middleware(['auth:api']);

