<?php
declare(strict_types=1);

namespace BudgetcontrolLibs\Mailer\View;

use MLAB\SdkMailer\View\Mail;

class BaseMail extends Mail {

    protected string $userEmail;
    protected string $userName;
    protected string $copyRightDate;

    public function __construct()
    {
        parent::__construct(__DIR__.'/../../resources/views/');
    }

    /**
     * Renders the data for the mail.
     *
     * @param array $data The data to be rendered.
     * @return array The rendered data.
     */
    protected function renderData(array $data): array
    {
        if(empty($this->userName) || empty($this->userEmail) || empty($this->copyRightDate)) {
            throw new \InvalidArgumentException('The user name, user email and copy right date cannot be empty.');
        }
        
        $currentData = [
            'user_name' => $this->userName,
            'user_email' => $this->userEmail,
            'copy_right_date' => $this->copyRightDate
        ];

        return array_merge($currentData, $data);

    }

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