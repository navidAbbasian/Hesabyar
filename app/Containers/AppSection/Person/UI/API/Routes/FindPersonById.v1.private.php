<?php

/**
 * @apiGroup           Person
 * @apiName            FindPersonById
 *
 * @api                {GET} /v1/people/:id Find Person By Id
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

use App\Containers\AppSection\Person\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::get('persons/{id}', [Controller::class, 'findPersonById'])
    ->middleware(['auth:api']);

