<?php

/**
 * @apiGroup           SideIncomeCategory
 * @apiName            DeleteSideIncomeCategory
 *
 * @api                {DELETE} /v1/side-income-categories/:id Delete Side Income Category
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

use App\Containers\AppSection\SideIncomeCategory\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::delete('side-income-categories/{id}', [Controller::class, 'deleteSideIncomeCategory'])
    ->middleware(['auth:api']);

