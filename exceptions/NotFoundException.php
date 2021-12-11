<?php


namespace bwharnsby\phpmvc\exceptions;


class NotFoundException extends \Exception
{
    protected $code = 404;
    protected $message = "Page not found";
}