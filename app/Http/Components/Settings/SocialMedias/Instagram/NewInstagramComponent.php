<?php

namespace App\Http\Components\Settings\SocialMedias\Instagram;

use App\Entities\InstagramUser;
use App\Http\Components\Settings\SocialMedias\SocialMediaComponent;
use App\Services\Instagram\Instagram;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\ValidationException;

use function App\Services\Instagram\generateCsrfToken;

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

        $cookieString = '';
        foreach (collect($responseLogin->cookies()->toArray()) as $cookie) {
            $cookieString .= vsprintf('; %s=%s', [$cookie['Name'], $cookie['Value']]);

            if ($cookie['Name'] === 'csrftoken') {
                $csrftoken = $cookie['Value'];
            }
        }

        $headers = [
            'cookie'      => $cookieString,
            'referer'     => 'https://www.instagram.com/',
            'x-csrftoken' => $csrftoken ?? generateCsrfToken(),
            'user-agent'  => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4421.5 Safari/537.36',
        ];

        $instagramUser = new InstagramUser();
        $instagramUser->id = $responseLogin->userId;
        $instagramUser->username = $this->username;
        $instagramUser->headers = $headers;

        $instagramUser->saveOrFail();
    }
}
