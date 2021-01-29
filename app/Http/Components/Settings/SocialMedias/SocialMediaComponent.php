<?php

namespace App\Http\Components\Settings\SocialMedias;

use App\Http\Components\Settings\SettingComponent;
use Illuminate\View\View;

/**
 * Class SocialMediaComponent
 *
 * @package App\Http\Components\Settings\SocialMedias
 */
class SocialMediaComponent extends SettingComponent
{
    /**
     * Runs once, immediately after the component is instantiated, but before render() is called.
     *
     * @void
     */
    protected function mount(): void
    {
        $this->pushBreadcrumbs('Mídias Sociais');

        parent::mount();
    }
}
