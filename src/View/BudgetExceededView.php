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
    private float $totalSpent;
    private string $budgetName;
    private string $spentPercentage;
    private string $percentage;
    private string $className = 'bg-red-200';
    private string $currency;
    private float $totalRemaining;
    private float $budgetAmount;

    /**
     * Renders the view for the budget exceeded notification.
     *
     * @return string The rendered view as a string.
     */
    public function view() :string
    {
        $this->setTemplate('command-jobs/budget_exceeded.twig');
        $this->setCopyRightDate((string) date('Y'));
        $this->validate();

        return $this->render(
            $this->renderData([
                'message' => $this->message,
                'totalSpent' => $this->totalSpent,
                'budgetName' => $this->budgetName,
                'spentPercentage' => $this->spentPercentage,
                'percentage' => $this->percentage > 100 ? 100 : $this->percentage,
                'className' => $this->className,
                'currency' => $this->currency,
                'totalRemaining' => $this->totalRemaining,
                'budgetAmount' => $this->budgetAmount
            ])
        );
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
     * Set the value of totalSPent
     *
     * @param float $totalSPent
     *
     * @return self
     */
    public function setTotalSpent(float $totalSpent): self
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
     * Set the value of currency
     *
     * @param string $currency
     *
     * @return self
     */
    public function setCurrency(string $currency): self
    {
        $this->currency = $currency;

        return $this;
    }


    /**
     * Set the value of totalRemaining
     *
     * @param float $totalRemaining
     *
     * @return self
     */
    public function setTotalRemaining(float $totalRemaining): self
    {
        $this->totalRemaining = $totalRemaining;

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

        if (empty($this->totalSpent)) {
            throw new \InvalidArgumentException('Total spent cannot be empty');
        }

        if (empty($this->budgetName)) {
            throw new \InvalidArgumentException('Budget name cannot be empty');
        }

        if (empty($this->spentPercentage)) {
            throw new \InvalidArgumentException('Spent percentage cannot be empty');
        }

        if (empty($this->percentage)) {
            throw new \InvalidArgumentException('Percentage cannot be empty');
        }

        if (!isset($this->className)) {
            throw new \InvalidArgumentException('Class name cannot be empty');
        }

        if (!isset($this->currency)) {
            throw new \InvalidArgumentException('Currency cannot be empty');
        }

        if (!isset($this->totalRemaining)) {
            throw new \InvalidArgumentException('Total remaining cannot be empty');
        }

        if (!isset($this->budgetAmount)) {
            throw new \InvalidArgumentException('Budget amount cannot be empty');
        }
    }


    /**
     * Set the value of budgetAmount
     *
     * @param float $budgetAmount
     *
     * @return self
     */
    public function setBudgetAmount(float $budgetAmount): self
    {
        $this->budgetAmount = $budgetAmount;

        return $this;
    }
}
