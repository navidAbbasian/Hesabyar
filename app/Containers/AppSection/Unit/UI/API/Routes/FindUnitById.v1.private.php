<?php

/**
 * @apiGroup           Unit
 * @apiName            FindUnitById
 *
 * @api                {GET} /v1/units/:id Find Unit By Id
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

use App\Containers\AppSection\Unit\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::get('units/{id}', [Controller::class, 'findUnitById'])
    ->middleware(['auth:api']);

