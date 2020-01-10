<?php

namespace TestAssessment\Exceptions;

use Throwable;

/**
 * Class NotValidInputException
 * @package TestAssessment\Exceptions
 */
class NotValidInputException extends \Exception
{
    public function __construct($message)
    {
        parent::__construct("Input value is not valid: {$message}");
    }
}
