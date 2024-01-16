<?php

/**
 * @apiGroup           SideIncomeCategory
 * @apiName            GetAllSideIncomeCategories
 *
 * @api                {GET} /v1/side-income-categories Get All Side Income Categories
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

Route::get('side-income-categories', [Controller::class, 'getAllSideIncomeCategories'])
    ->middleware(['auth:api']);

