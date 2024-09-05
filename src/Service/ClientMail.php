<?php

declare(strict_types=1);

namespace BudgetcontrolLibs\Mailer\Service;

use MLAB\SdkMailer\Service\Mail;
use BudgetcontrolLibs\Mailer\Exceptions\ErrorSendingMail;
use BudgetcontrolLibs\Mailer\View\ViewInterface;

final class ClientMail
{
    private Mail $mail;

    public function __construct(string $host, string $driver, string $password, string $user, string $emailFromAddress)
    {
        $this->mail = new Mail();
        $this->mail->setHost($host);
        $this->mail->setDriver($driver);
        $this->mail->setPassword($password);
        $this->mail->setUser($user);
        $this->mail->setEmailFromAddress($emailFromAddress);
    }

    /**
     * Sends an email to the specified recipient.
     *
     * @param string|array $emailTo The email address of the recipient.
     * @param string $subject The subject of the email.
     * @param ViewInterface $view The view object representing the email content.
     * @throws ErrorSendingMail Thrown if an error occurs while sending the email.
     * @return void
     */
    public function send(string|array $emailTo, string $subject, ViewInterface $view): void
    {
        try {

            $this->mail->sendMail($emailTo, $subject, $view);

        } catch (\Throwable $e) {

            throw new ErrorSendingMail($e->getMessage());
            
        }
    }
}
