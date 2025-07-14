<?php
declare(strict_types=1);

namespace BudgetcontrolLibs\Mailer\View;

/**
 * Class ContactView
 * Represents a view for a contact email.
 */
class ContactView extends BaseMail implements ViewInterface
{

    private string $messageBody;

    public function getTemplate(): string
    {
        return 'contact/base-contact.twig';
    }

    /**
     * Renders the view for the contact email.
     *
     * @return string The rendered view as a string.
     */
    public function view(): string
    {

        $this->setTemplate($this->getTemplate());
        $this->setCopyRightDate((string) date('Y'));
        $this->validate();
        $this->renderData(
            [
                'message_body' => $this->messageBody,
            ]
            );

        return $this->render();

    }

    public function validate(): void
    {
        if (!isset($this->messageBody) || empty($this->messageBody)) {
            throw new \InvalidArgumentException('Message body is required for rendering the contact view.');
        }
    }

    /**
     * Set the value of messageBody
     *
     * @return  self
     */ 
    public function setMessageBody($messageBody)
    {
        $this->messageBody = $messageBody;

        return $this;
    }
}