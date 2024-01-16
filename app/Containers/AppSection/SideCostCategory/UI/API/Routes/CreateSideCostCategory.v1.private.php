<?php

/**
 * @apiGroup           SideCostCategory
 * @apiName            CreateSideCostCategory
 *
 * @api                {POST} /v1/side-cost-categories Create Side Cost Category
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

use App\Containers\AppSection\SideCostCategory\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::post('side-cost-categories', [Controller::class, 'createSideCostCategory'])
    ->middleware(['auth:api']);

