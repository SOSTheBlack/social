<?php

namespace App\Http\Components\Settings\SocialMedias;

use App\Helpers\Http\Components\BuildComponent;
use App\Helpers\Http\Components\ComponentInterface;
use Livewire\Component;
use Illuminate\Contracts\View\View;

/**
 * Class SocialMediaComponent
 *
 * @package App\Http\Components\Settings\SocialMedias
 */
class IndexSocialMediaComponent extends Component implements ComponentInterface
{
    use BuildComponent;

    /**
     * Title of Page.
     *
     * @const string
     */
    protected const PAGE_TITLE = ' Lista de integrações';

        /**
     * Breadcrumbs of content.
     *
     * @var array
     */
    public array $breadcrumbs;

    /**
     * @return View
     */
    public function render(): View
    {
        return view('components.settings.social_medias.index-component');
    }

    /**
     * Runs once, immediately after the component is instantiated, but before render() is called.
     *
     * @void
     */
    public function mount()
    {
        $this->initialize();

        $user = user(['enterprises']);
    }

    public function initialize()
    {
        $this->setPageTitle(self::PAGE_TITLE);
        $this->setBreadcrumbs([
            ['name' => 'Mídias Sociais', 'link' => route('settings.social_medias.list')],
        ]);
    }
}
