<?php

namespace App\Http\Components\Settings\SocialMedias\Instagram;

use App\Http\Components\Settings\SocialMedias\SocialMediaComponent;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\ValidationException;

/**
 * Class NewInstagramComponent
 *
 * @package App\Http\Components\Dashboard\Settings\SocialMedias\Instagram
 */
class NewInstagramComponent extends SocialMediaComponent
{
    /**
     * Title of Page.
     *
     * @const string
     */
    private const PAGE_TITLE = 'Novo Instagram';

    /**
     * @var string
     */
    public string $usernameInstagram = '', $passwordInstagram = '';

    /**
     * @var string[][]
     */
    protected $rules = [
        'usernameInstagram' => ['required', 'string'],
        'passwordInstagram' => ['required', 'string']
    ];

    /**
     * @param $propertyName
     *
     * @throws ValidationException
     */
    public function updated(string $propertyName): void
    {
        $this->validateOnly($propertyName);
    }

    /**
     * Runs once, immediately after the component is instantiated, but before render() is called.
     *
     * @void
     */
    public function mount(): void
    {
        $this->setPageTitle(self::PAGE_TITLE)->pushBreadcrumbs(self::PAGE_TITLE);

        parent::mount();
    }

    /**
     * @return View
     */
    public function render(): View
    {
        return view('components.settings.social_medias.instagram.new-component');
    }

    public function submit()
    {

        dd($this->usernameInstagram);
    }
}
