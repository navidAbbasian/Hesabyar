<?php

/**
 * @apiGroup           Supplier
 * @apiName            UpdateSupplier
 *
 * @api                {PATCH} /v1/suppliers/:id Update Supplier
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

use App\Containers\AppSection\Supplier\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::patch('suppliers/{id}', [Controller::class, 'updateSupplier'])
    ->middleware(['auth:api']);

