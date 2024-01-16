<?php

/**
 * @apiGroup           PersonCategory
 * @apiName            DeletePersonCategory
 *
 * @api                {DELETE} /v1/person-categories/:id Delete Person Category
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

use App\Containers\AppSection\PersonCategory\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::delete('person-categories/{id}', [Controller::class, 'deletePersonCategory'])
    ->middleware(['auth:api']);

