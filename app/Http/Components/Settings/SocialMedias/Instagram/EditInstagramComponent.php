<?php

namespace App\Http\Components\Settings\SocialMedias\Instagram;

use App\Helpers\Http\Components\BuildComponent;
use App\Helpers\Http\Components\ComponentInterface;
use Illuminate\Contracts\View\View;
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
    protected const PAGE_TITLE = ' Instagram';

    /**
     * @return View
     */
    public function render()
    {
        return view('components.settings.social_medias.instagram.edit-component');
    }

    /**
     * Runs once, immediately after the component is instantiated, but before render() is called.
     *
     * @param $socialMediaAccount
     */
    public function mount($socialMediaAccount): void
    {
        $this->setPageTitle(self::PAGE_TITLE);
        $this->setBreadcrumbs([
            ['name' => 'Mídias Sociais', 'link' => route('settings.social_medias.instagram.edit', [$socialMediaAccount['id']])],
            ['name' => 'Configuração', 'link' => route('settings.social_medias.instagram.edit', [$socialMediaAccount['id']])]
        ]);
    }
}
