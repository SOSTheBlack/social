<?php

namespace App\Http\Components\Settings\SocialMedias\Instagram;

use App\Entities\SocialMedia;
use App\Http\Components\Settings\SocialMedias\SocialMediaComponent;
use App\SocialMedias\Instagram\Instagram;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\ValidationException;

use function App\SocialMedias\Instagram\generateCsrfToken;

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
    public string $password = '';

    /**
     * @var string[][]
     */
    protected $rules
        = [
            'username' => ['required', 'string'],
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
        $instagram = new Instagram();

        $responseLogin = $instagram->auth()->login($this->username, $this->password);

        $headers = $this->structureHeaders($responseLogin->cookies()->toArray());

//        $this->socialMediaAccountRepository->create([
//            'social_media_id' => SocialMedia::
//                                                    ]);

        $instagramUser = new InstagramUser();
        $instagramUser->id = $responseLogin->userId;
        $instagramUser->username = $this->username;
        $instagramUser->headers = $this->structureHeaders($responseLogin->cookies()->toArray());

        $instagramUser->saveOrFail();
    }
}
