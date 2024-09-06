<?php
declare(strict_types=1);

namespace BudgetcontrolLibs\Mailer\View;

/**
 * Class BudgetExceededView
 * Represents a view for a budget exceeded email.
 */
class BudgetExceededView extends BaseMail implements ViewInterface
{
    private string $message;
    private string $name;
    private string $totalSpent;
    private string $budgetName;
    private string $spentPercentage;
    private string $percentage;
    private string $className = 'bg-red-200';

    public function __construct()
    {
        parent::__construct(__DIR__.'/../../resources/views/command-jobs/');
        $this->setCopyRightDate((string) date('Y'));
    }

    /**
     * Renders the view for the budget exceeded notification.
     *
     * @return string The rendered view as a string.
     */
    public function view() :string
    {
        $this->setTemplate('budget_exceeded.twig');

        $this->validate();

        return $this->render([
            'message' => $this->message,
            'name' => $this->name,
            'totalSpent' => $this->totalSpent,
            'budgetName' => $this->budgetName,
            'spentPercentage' => $this->spentPercentage,
            'percentage' => $this->percentage > 100 ? 100 : $this->percentage,
            'className' => $this->className,
            'user_name' => $this->userName,
            'user_email' => $this->userEmail,
            'copyright_date' => $this->copyRightDate
        ]);
    }

    /**
     * Sets the message for the budget exceeded email.
     *
     * @param string $message The message to set.
     * @return self
     */
    public function setMessage(string $budgetName): self
    {   
        $this->budgetName = $budgetName;
        $this->message = "Your budget $budgetName, has been exceeded. Please review your expenses and make necessary adjustments.";

        return $this;
    }

    /**
     * Set the value of name
     *
     * @param string $name
     *
     * @return self
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Set the value of totalSPent
     *
     * @param string $totalSPent
     *
     * @return self
     */
    public function setTotalSpent(string $totalSpent): self
    {
        $this->totalSpent = $totalSpent;

        return $this;
    }


    /**
     * Set the value of spentPercentage
     *
     * @param string $spentPercentage
     *
     * @return self
     */
    public function setSpentPercentage(string $spentPercentage): self
    {
        $this->spentPercentage = $spentPercentage;

        return $this;
    }


    /**
     * Set the value of percentage
     *
     * @param string $percentage
     *
     * @return self
     */
    public function setPercentage(string $percentage): self
    {
        $this->percentage = $percentage;

        return $this;
    }


    /**
     * Set the value of className
     *
     * @param string $className
     *
     * @return self
     */
    public function setClassName(string $className): self
    {
        $this->className = $className;

        return $this;
    }

    /**
     * Validates the budget exceeded view.
     *
     * This method is responsible for performing any necessary validation
     * for the budget exceeded view. It ensures that the view is in a valid
     * state before it is used.
     *
     * @return void
     */
    public function validate(): void
    {
        if (!isset($this->message)) {
            throw new \InvalidArgumentException('Message cannot be empty');
        }

        if (!isset($this->name)) {
            throw new \InvalidArgumentException('Name cannot be empty');
        }

        if (!isset($this->totalSpent)) {
            throw new \InvalidArgumentException('Total spent cannot be empty');
        }

        if (!isset($this->budgetName)) {
            throw new \InvalidArgumentException('Budget name cannot be empty');
        }

        if (!isset($this->spentPercentage)) {
            throw new \InvalidArgumentException('Spent percentage cannot be empty');
        }

        if (!isset($this->percentage)) {
            throw new \InvalidArgumentException('Percentage cannot be empty');
        }

        if (!isset($this->className)) {
            throw new \InvalidArgumentException('Class name cannot be empty');
        }

        if (!isset($this->userName)) {
            throw new \InvalidArgumentException('User name cannot be empty');
        }

        if (!isset($this->userEmail)) {
            throw new \InvalidArgumentException('User email cannot be empty');
        }

        if (!isset($this->copyRightDate)) {
            throw new \InvalidArgumentException('Copy right date cannot be empty');
        }
    }
}
