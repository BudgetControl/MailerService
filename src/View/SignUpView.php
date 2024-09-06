<?php
declare(strict_types=1);

namespace BudgetcontrolLibs\Mailer\View;

use BudgetcontrolLibs\Mailer\View\BaseMail;
use BudgetcontrolLibs\Mailer\View\ViewInterface;

class SignUpView extends BaseMail implements ViewInterface {
    
    private string $confirmLink;

    public function __construct()
    {
        parent::__construct(__DIR__.'/../../resources/views/authentication/');
        $this->setCopyRightDate((string) date('Y'));
    }

    /**
     * Renders the view for the budget exceeded notification.
     *
     * @return string The rendered view as a string.
     */
    public function view() :string
    {
        $this->setTemplate('signup.twig');

        $this->validate();

        return $this->render(
            $this->renderData(
                [
                    'confirm_link' => $this->confirmLink
                ]
            )
        );
    }

    /**
     * Validates the recovery password view.
     *
     * This method is responsible for performing validation on the recovery password view.
     * It ensures that all required fields are filled and that the data entered is valid.
     *
     * @return void
     */
    public function validate(): void
    {
        if (empty($this->link)) {
            throw new \InvalidArgumentException('The link cannot be empty.');
        }
    }


    /**
     * Set the value of confirmLink
     *
     * @param string $confirmLink
     *
     * @return self
     */
    public function setConfirmLink(string $confirmLink): self
    {
        $this->confirmLink = $confirmLink;

        return $this;
    }
}