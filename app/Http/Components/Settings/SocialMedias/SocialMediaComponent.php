<?php

namespace App\Http\Components\Settings\SocialMedias;

use App\Http\Components\Settings\SettingComponent;
use App\Repositories\Contracts\SocialMediaAccountRepository;
use App\Repositories\Contracts\SocialMediaRepository;

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
     * @var SocialMediaRepository
     */
    protected SocialMediaRepository $socialMediaRepository;

    public function __construct($id = null)
    {
        parent::__construct($id);

        $this->socialMediaRepository = app(SocialMediaRepository::class);
        $this->socialMediaAccountRepository = app(SocialMediaAccountRepository::class);
    }

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
