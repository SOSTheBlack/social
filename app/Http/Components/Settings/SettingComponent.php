<?php

namespace App\Http\Components\Settings;

use App\Http\Components\BaseComponent;

/**
 * Class SettingComponent
 *
 * @package App\Http\Components\Settings
 */
class SettingComponent extends BaseComponent
{
    /**
     * Runs once, immediately after the component is instantiated, but before render() is called.
     *
     * @void
     */
    protected function mount(): void
    {
        $this->pushBreadcrumbs('Configurações');

        parent::mount();
    }
}
