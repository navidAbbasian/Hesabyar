<?php

namespace App\Containers\AppSection\SellProductFactor\Exceptions;

use App\Ship\Parents\Exceptions\Exception as ParentException;
use Symfony\Component\HttpFoundation\Response;

class OutOfStockException extends ParentException
{
    protected $code = Response::HTTP_BAD_REQUEST;
    protected $message = 'موجود نیست';
}
