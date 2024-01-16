<?php

/**
 * @apiGroup           FinancialReport
 * @apiName            DeleteFinancialReport
 *
 * @api                {DELETE} /v1/financial-reports/:id Delete Financial Report
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

Route::delete('financial-reports/{id}', [Controller::class, 'deleteFinancialReport'])
    ->middleware(['auth:api']);

