<?php
declare(strict_types=1);

namespace BudgetcontrolLibs\Mailer\View;

use MLAB\SdkMailer\View\ViewInterface as ViewBase;

interface ViewInterface extends ViewBase
{
    /**
     * Returns the view content as a string.
     *
     * @return string
     */
    public function view() :string;

    /**
     * Validates the view.
     *
     * @return void
     */
    public function validate() :void;

    /**
     * Renders the view with the given data.
     *
     * @param array $data The data to be passed to the view.
     * @return string The rendered view as a string.
     */
    public function render(array $data = []): string;
}