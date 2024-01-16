<?php

/**
 * @apiGroup           FinancialReport
 * @apiName            FindFinancialReportById
 *
 * @api                {GET} /v1/financial-reports/:id Find Financial Report By Id
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

use App\Containers\AppSection\FinancialReport\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::get('financial-reports/{id}', [Controller::class, 'findFinancialReportById'])
    ->middleware(['auth:api']);

