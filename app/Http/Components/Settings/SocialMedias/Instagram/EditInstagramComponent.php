<?php

namespace App\Http\Components\Settings\SocialMedias\Instagram;

use App\Entities\SocialMediaAccount;
use App\Helpers\Http\Components\BuildComponent;
use App\Helpers\Http\Components\ComponentInterface;
use App\SocialMedias\Instagram\Instagram;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Livewire\Component;

/**
 * Class EditInstagramComponent.
 *
 * @package App\Http\Components\Settings\SOcialMedias\Instagram
 */
class EditInstagramComponent extends Component implements ComponentInterface
{
    use BuildComponent;

    /**
     * Title of Page.
     *
     * @const string
     */
    protected const PAGE_TITLE = Instagram::NAME;

    /**
     * @return View
     */
    public function render(): View
    {
        return view('components.settings.social_medias.instagram.edit-component');
    }

    /**
     * Runs once, immediately after the component is instantiated, but before render() is called.
     *
     * @param $socialMediaAccount
     */
    public function mount(SocialMediaAccount $socialMediaAccount): void
    {
        $this->setPageTitle(vsprintf('%s - %s', [Str::upper($socialMediaAccount->username), self::PAGE_TITLE]));
        $this->setBreadcrumbs([
            ['name' => 'Mídias Sociais', 'link' => route('settings.social_medias.instagram.edit', [$socialMediaAccount->id])],
            ['name' => 'Configuração', 'link' => route('settings.social_medias.instagram.edit', [$socialMediaAccount->id])]
        ]);
    }
}
