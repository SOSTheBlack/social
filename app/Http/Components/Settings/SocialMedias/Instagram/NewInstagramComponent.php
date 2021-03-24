<?php

namespace App\Http\Components\Settings\SocialMedias\Instagram;

use App\Http\Components\Settings\SocialMedias\SocialMediaComponent;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\ValidationException;
use Throwable;

/**
 * Class NewInstagramComponent
 *
 * @package App\Http\Components\Dashboard\Settings\SocialMedias\Instagram
 */
class NewInstagramComponent extends SocialMediaComponent
{
    use NewInstagramTrait;

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
     * @var string[][]
     */
    protected array $rules = [
        'username' => ['required', 'string', 'unique:\App\Entities\SocialMediaAccount,username'],
        'password' => ['required', 'string'],
    ];

    public function __construct($id = null)
    {
        parent::__construct($id);
    }

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

    /**
     * @return void
     */
    public function submit(): void
    {
        $this->validate();

        try {
            $responseLogin = $this->singInInstagram();
            $this->createAccount($responseLogin);
            #TODO ??? buscar informações basicas
        } catch (Throwable $exception) {
            return;
        }

        alertSession('Instagram sincronizado com sucesso!!!', 'green');
    }
}
