<?php
declare(strict_types=1);

namespace BudgetcontrolLibs\Mailer\View;

use MLAB\SdkMailer\View\Mail;

class BaseMail extends Mail {

    protected string $userEmail;
    protected string $userName;
    protected string $copyRightDate;

    /**
     * Set the value of userName
     *
     * @param string $userName
     *
     * @return self
     */
    public function setUserName(string $userName): self
    {
        $this->userName = $userName;

        return $this;
    }


    /**
     * Set the value of userEmail
     *
     * @param string $userEmail
     *
     * @return self
     */
    public function setUserEmail(string $userEmail): self
    {
        $this->userEmail = $userEmail;

        return $this;
    }


    /**
     * Set the value of copyRightDate
     *
     * @param string $copyRightDate
     *
     * @return self
     */
    public function setCopyRightDate(string $copyRightDate): self
    {
        $this->copyRightDate = $copyRightDate;

        return $this;
    }
}