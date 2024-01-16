<?php

/**
 * @apiGroup           SideIncome
 * @apiName            DeleteSideIncome
 *
 * @api                {DELETE} /v1/side-incomes/:id Delete Side Income
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

use App\Containers\AppSection\SideIncome\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::delete('side-incomes/{id}', [Controller::class, 'deleteSideIncome'])
    ->middleware(['auth:api']);

