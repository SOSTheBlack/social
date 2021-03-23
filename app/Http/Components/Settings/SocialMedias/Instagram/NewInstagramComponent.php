<?php

namespace App\Http\Components\Settings\SocialMedias\Instagram;

use App\Http\Components\Settings\SocialMedias\SocialMediaComponent;
use App\SocialMedias\Instagram\Instagram;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Client\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;

use function redirect;

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
    protected $rules = [
        'username' => ['required', 'string'],
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
     * @return RedirectResponse
     */
    public function submit(): RedirectResponse
    {
        $responseLogin = (new Instagram())->auth()->login($this->username, $this->password);

        $this->createSocialMediaAccount($responseLogin);

        return redirect()->route('home');
    }

    private function createSocialMediaAccount(Response $responseLogin)
    {
        $body = $responseLogin->object();

        if ($body->user === false) {
            #TODO usuário não encontrado
        } elseif ($body->authenticated === false) {
            #TODO senha incorreta
        }

        dump($body);
        $headers = $this->structureHeaders($responseLogin->cookies()->toArray());

        $socialMedia = $this->socialMediaRepository->firstWhereOrFail(['slug' => Instagram::SLUG], ['id']);

        return $this->socialMediaAccountRepository->createOrFail(
            [
                'social_media_id' => $socialMedia,
                'enterprise_id' => app('auth')->user()->enterprise->id,
                'ref_id' => $body->userId,
                'username' => $this->username,
                'settings' => [
                    'headers' => $headers,
                    'password' => encrypt($this->password)
                ]
            ]
        );
    }
}
