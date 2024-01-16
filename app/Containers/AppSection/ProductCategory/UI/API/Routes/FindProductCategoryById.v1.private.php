<?php

/**
 * @apiGroup           ProductCategory
 * @apiName            FindProductCategoryById
 *
 * @api                {GET} /v1/product-categories/:id Find Product Category By Id
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

Route::get('product-categories/{id}', [Controller::class, 'findProductCategoryById'])
    ->middleware(['auth:api']);

