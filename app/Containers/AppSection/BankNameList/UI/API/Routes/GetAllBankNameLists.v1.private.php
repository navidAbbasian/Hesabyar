<?php

/**
 * @apiGroup           BankNameList
 * @apiName            GetAllBankNameLists
 *
 * @api                {GET} /v1/bank-name-lists Get All Bank Name Lists
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

Route::get('bank-name-lists', [Controller::class, 'getAllBankNameLists'])
    ->middleware(['auth:api']);

