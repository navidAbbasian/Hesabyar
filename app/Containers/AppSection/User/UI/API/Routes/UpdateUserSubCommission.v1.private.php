<?php

/**
 * @apiGroup           User
 * @apiName
 *
 * @api                {PATCH} /v1/
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

use App\Containers\AppSection\User\UI\API\Controllers\UpdateUserSubCommissionController;
use Illuminate\Support\Facades\Route;

Route::post('users/sub-commission', [UpdateUserSubCommissionController::class, 'updateSubCommissionUser'])
    ->middleware(['auth:api']);

