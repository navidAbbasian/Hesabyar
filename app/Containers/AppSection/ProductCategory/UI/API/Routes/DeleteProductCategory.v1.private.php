<?php

/**
 * @apiGroup           ProductCategory
 * @apiName            DeleteProductCategory
 *
 * @api                {DELETE} /v1/product-categories/:id Delete Product Category
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

use App\Containers\AppSection\ProductCategory\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::delete('product-categories/{id}', [Controller::class, 'deleteProductCategory'])
    ->middleware(['auth:api']);

