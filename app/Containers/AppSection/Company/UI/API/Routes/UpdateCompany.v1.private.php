<?php

/**
 * @apiGroup           Company
 * @apiName            UpdateCompany
 *
 * @api                {PATCH} /v1/companies/:id Update Company
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

use App\Containers\AppSection\Company\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::patch('companies/{id}', [Controller::class, 'updateCompany'])
    ->middleware(['auth:api']);

