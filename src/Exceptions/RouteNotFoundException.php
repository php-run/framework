<?php

namespace Run\Exceptions;
use Exception;

class RouteNotFoundException extends Exception
{

    protected $message = '404 not found route';
}