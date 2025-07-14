<?php

declare(strict_types=1);

namespace BudgetcontrolLibs\Mailer\Service;

use BudgetcontrolLibs\Mailer\Exceptions\ErrorSendingMail;
use BudgetcontrolLibs\Mailer\View\ViewInterface;
use MLAB\SdkMailer\Smtp\SmtpInterfaceModel;

final class ClientMail
{
    private \MLAB\SdkMailer\Service\EmailService $mail;

    public function __construct(SmtpInterfaceModel $smtpConfig, string $fromEmail)
    {
        $this->mail = new \MLAB\SdkMailer\Service\EmailService($smtpConfig, $fromEmail);
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

            $this->mail->sendEmail($emailTo, $subject, $view);

        } catch (\Throwable $e) {

            throw new ErrorSendingMail($e->getMessage());
            
        }
    }
}
