<?php

namespace App\Http\Components\Settings\SocialMedias\Instagram;

use App\Helpers\Http\Components\BuildComponent;
use App\Http\Components\Settings\SocialMedias\IndexSocialMediaComponent;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use Throwable;

/**
 * Class NewInstagramComponent
 *
 * @package App\Http\Components\Dashboard\Settings\SocialMedias\Instagram
 */
class NewInstagramComponent extends Component
{
    use NewInstagramTrait;
    use BuildComponent;

    /**
     * Title of Page.
     *
     * @const string
     */
    private const PAGE_TITLE = 'Novo Instagram';

    /**
     * @var string
     */
    public string $username = '';

    /**
     * @var string
     */
    public string $password = '';

    /**
     * @var mixed
     */
    public array $enterprises;

    /**
     * @var mixed
     */
    public ?string $enterpriseId = null;

    /**
     * @var string[][]
     */
    protected array $rules = [
        'username' => ['required', 'string', 'unique:\App\Entities\SocialMediaAccount,username'],
        'password' => ['required', 'string'],
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
        $this->setPageTitle(self::PAGE_TITLE);
        $this->setBreadcrumbs([
            [
                'name' => 'Mídias Sociais',
                'link' => route('settings.social_medias.list')
            ],
            [
                'name' => 'Novo Instagram',
                'link' => route('settings.social_medias.instagram.new')
            ]
        ]);
    }

    /**
     * @return View
     */
    public function render(): View
    {
        $this->defineEnterprise();

        return view('components.settings.social_medias.instagram.new-component');
    }

    /**
     * @return void
     */
    public function submit(): void
    {
        $this->validate();

        try {
            $responseLogin = $this->singInInstagram();
            $this->createAccount($responseLogin);
        } catch (Throwable $exception) {
            return;
        }

        alertSession('Instagram sincronizado com sucesso!!!', 'green');
    }

}
