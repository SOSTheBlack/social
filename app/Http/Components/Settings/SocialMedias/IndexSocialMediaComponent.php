<?php

namespace App\Http\Components\Settings\SocialMedias;

use App\Helpers\Http\Components\BuildComponent;
use App\Helpers\Http\Components\ComponentInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Livewire\Component;

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
     * @var \Illuminate\Support\Collection
     */
    public Collection $socialMediaAccounts;

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
        $this->socialMediaAccounts = collect();

        /** It brings together in a single list the integrated social networks of all companies that the user is allowed. */
        user(['enterprises.social_media_accounts'])->enterprises
            ->pluck('social_media_accounts.*', 'id')
            ->filter(fn (array $listAccountsOfEnterprise) => ! empty($listAccountsOfEnterprise))
            ->each(fn (array $listAccountsOfEnterprise) => $this->socialMediaAccounts->push(... $listAccountsOfEnterprise));
    }

    /**
     * @return void
     */
    public function initialize()
    {
        $this->setPageTitle(self::PAGE_TITLE);
        $this->setBreadcrumbs([
            ['name' => 'Mídias Sociais', 'link' => route('settings.social_medias.list')],
        ]);
    }
}
