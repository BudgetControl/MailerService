<?php
declare(strict_types=1);

namespace BudgetcontrolLibs\Mailer\Exceptions;

class ErrorSendingMail extends \Exception
{
    public function __construct(string $message)
    {
        parent::__construct($message);
    }
}