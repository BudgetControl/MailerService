<?php
declare(strict_types=1);

namespace BudgetcontrolLibs\Mailer\View;

/**
 * Class ShareWorkspaceVIew
 * Represents a view for a budget exceeded email.
 */
class UnShareWorkspaceView extends BaseMail implements ViewInterface
{
    private string $workspaceName;
    private string $userFrom;

    /**
     * Renders the view for the budget exceeded notification.
     *
     * @return string The rendered view as a string.
     */
    public function view(): string
    {
        $this->setTemplate('workspace/un-share.twig');
        $this->validate();
        $this->setData(
            $this->renderData(
                [
                    'workspace_name' => $this->workspaceName,
                    'user_from' => $this->userFrom,
                ]
            )
        );

        return $this->render();
        
    }

    /**
     * Set the value of workspaceName
     *
     * @param string $workspaceName
     *
     * @return self
     */
    public function setWorkspaceName(string $workspaceName): self
    {
        $this->workspaceName = $workspaceName;

        return $this;
    }

    /**
     * Set the value of userFrom
     *
     * @param string $userFrom
     *
     * @return self
     */
    public function setUserFrom(string $userFrom): self
    {
        $this->userFrom = $userFrom;

        return $this;
    }


    public function validate(): void
    {
        if (empty($this->workspaceName)) {
            throw new \InvalidArgumentException('Workspace name is required');
        }

        if (empty($this->userFrom)) {
            throw new \InvalidArgumentException('User from is required');
        }
    }



}