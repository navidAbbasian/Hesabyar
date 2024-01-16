<?php

/**
 * @apiGroup           Fund
 * @apiName            DeleteFund
 *
 * @api                {DELETE} /v1/funds/:id Delete Fund
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

use App\Containers\AppSection\Fund\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::delete('funds/{id}', [Controller::class, 'deleteFund'])
    ->middleware(['auth:api']);

