<?php


namespace App\Services\Instagram\Resources;


use App\Services\Instagram\Instagram;

use Illuminate\Http\Client\Response;

use function App\Services\Instagram\generateCsrfToken;

class AuthResource
{
    /**
     * @var Instagram
     */
    private Instagram $instagram;

    public function __construct(Instagram $instagram)
    {
        $this->instagram = $instagram;
    }

    /**
     * @param  string  $username
     * @param  string  $password
     *
     * @return Response
     */
    public function login(string $username, string $password): Response
    {
        $headers = [
            'referer'     => 'https://www.instagram.com/',
            'x-csrftoken' => instaGenerateCsrfToken(),
            'user-agent'  => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.89 Safari/537.36',
        ];

        return $this->instagram->asForm()
            ->withHeaders($headers)
            ->post('https://www.instagram.com/accounts/login/ajax/', ['username' => $username, 'enc_password' => instaGeneratePasswordHash($password)]);
    }
}
