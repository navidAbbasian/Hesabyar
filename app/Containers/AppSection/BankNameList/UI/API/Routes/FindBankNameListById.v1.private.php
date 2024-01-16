<?php

/**
 * @apiGroup           BankNameList
 * @apiName            FindBankNameListById
 *
 * @api                {GET} /v1/bank-name-lists/:id Find Bank Name List By Id
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

use App\Containers\AppSection\BankNameList\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::get('bank-name-lists/{id}', [Controller::class, 'findBankNameListById'])
    ->middleware(['auth:api']);

