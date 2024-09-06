<?php
declare(strict_types=1);

namespace BudgetcontrolLibs\Mailer\View;

use BudgetcontrolLibs\Mailer\View\BaseMail;
use BudgetcontrolLibs\Mailer\View\ViewInterface;

class RecoveryPasswordView extends BaseMail implements ViewInterface {
    
    private string $link;

    /**
     * Renders the view for the budget exceeded notification.
     *
     * @return string The rendered view as a string.
     */
    public function view() :string
    {
        $this->setTemplate('authentication/recovery_password.twig');
        $this->setCopyRightDate((string) date('Y'));
        $this->validate();

        return $this->render(
            $this->renderData(
                [
                    'link' => $this->link
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
     * Set the value of link
     *
     * @param string $link
     *
     * @return self
     */
    public function setLink(string $link): self
    {
        $this->link = $link;

        return $this;
    }
}