<?php

namespace App\Containers\AppSection\Transaction\Exceptions;

use App\Ship\Parents\Exceptions\Exception as ParentException;
use Symfony\Component\HttpFoundation\Response;

class InvalidAmountException extends ParentException
{
    protected $code = Response::HTTP_BAD_REQUEST;
    protected $message = 'قیمت معتبر نیست';
}
