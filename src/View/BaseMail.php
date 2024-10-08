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
        $this->copyRightDate = (string) date('Y');
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
        $this->validate()
;        
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

    /**
     * Validates the base mail.
     *
     * @return void
     */
    public function validate(): void
    {
        if(empty($this->userName)) {
            throw new \InvalidArgumentException('User name cannot be empty');
        }

        if(empty($this->userEmail)) {
            throw new \InvalidArgumentException('User email cannot be empty');
        }

        if(!isset($this->copyRightDate)) {
            $this->copyRightDate = (string) date('Y');
        }
    }
}
