<?php

/**
 * @apiGroup           BankNameList
 * @apiName            CreateBankNameList
 *
 * @api                {POST} /v1/bank-name-lists Create Bank Name List
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

Route::post('bank-name-lists', [Controller::class, 'createBankNameList'])
    ->middleware(['auth:api']);

