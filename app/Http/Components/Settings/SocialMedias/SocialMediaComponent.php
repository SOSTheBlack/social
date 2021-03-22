<?php

namespace App\Http\Components\Settings\SocialMedias;

use App\Http\Components\Settings\SettingComponent;
use App\Repositories\Contracts\SocialMediaAccountRepository;

/**
 * Class SocialMediaComponent
 *
 * @package App\Http\Components\Settings\SocialMedias
 */
class SocialMediaComponent extends SettingComponent
{
    /**
     * @var SocialMediaAccountRepository
     */
    protected SocialMediaAccountRepository $socialMediaAccountRepository;

    /**
     * Runs once, immediately after the component is instantiated, but before render() is called.
     *
     * @void
     */
    protected function mount(): void
    {
        $this->socialMediaAccountRepository = app(SocialMediaAccountRepository::class);

        $this->pushBreadcrumbs('Mídias Sociais');

        parent::mount();
    }
}
