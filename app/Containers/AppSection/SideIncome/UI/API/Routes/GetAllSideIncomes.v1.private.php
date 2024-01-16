<?php

/**
 * @apiGroup           SideIncome
 * @apiName            GetAllSideIncomes
 *
 * @api                {GET} /v1/side-incomes Get All Side Incomes
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

Route::get('side-incomes', [Controller::class, 'getAllSideIncomes'])
    ->middleware(['auth:api']);

