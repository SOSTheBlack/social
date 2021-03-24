<?php

namespace App\SocialMedias\Instagram\Resources;

use App\SocialMedias\Instagram\Exceptions\AuthenticationException;
use App\SocialMedias\Instagram\Instagram;
use Illuminate\Http\Client\Response;
use JetBrains\PhpStorm\ArrayShape;

/**
 * Class AuthResource
 * @package App\SocialMedias\Instagram\Resources
 */
class AuthResource
{
    /**
     * @const string
     */
    private const FIELD_USERNAME = 'username';

    /**
     * @const string
     */
    private const FIELD_PASSWORD = 'enc_password';

    /**
     * @const string
     */
    private const BASE_URI = 'https://www.instagram.com';

    /**
     * @const string
     */
    private const ENDPOINT = '/accounts/login/ajax/';

    /**
     * @var Instagram
     */
    private Instagram $instagram;

    /**
     * @var array
     */
    private array $headers;

    /**
     * AuthResource constructor.
     *
     * @param  Instagram  $instagram
     */
    public function __construct(Instagram $instagram)
    {
        $this->instagram = $instagram;

        $this->headers = $this->defineHeaders();
    }

    /**
     * @return array
     */
    #[ArrayShape([
        'referer' => "string",
        'x-csrftoken' => "string",
        'user-agent' => "string"
    ])]
    private function defineHeaders(): array
    {
        return [
            'referer' => self::BASE_URI,
            'x-csrftoken' => $this->instagram->generateCsrfToken(),
            'user-agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.89 Safari/537.36',
        ];
    }

    /**
     * @param  string  $username
     * @param  string  $password
     *
     * @return Response
     *
     * @throws AuthenticationException
     */
    public function login(string $username, string $password): Response
    {
        $url = self::BASE_URI.self::ENDPOINT;
        $form = [
            self::FIELD_USERNAME => $username,
            self::FIELD_PASSWORD => $this->instagram->generatePasswordHash($password)
        ];

        $response = $this->instagram
            ->asForm()
            ->withHeaders($this->headers)
            ->post($url, $form);

        $this->validLogin($response);

        return $response;
    }

    /**
     * @param  Response  $response
     *
     * @return void
     *
     * @throws AuthenticationException
     */
    private function validLogin(Response $response): void
    {
        $body = $response->object();

        if ($body->status === 'fail') {
            $authError = optional($body)->message ?? __('Erro não reconhecido ao autenticar.');
        } elseif ($body->user === false) {
            $authError = 'Usuário não existente.';
        } elseif ($body->authenticated === false) {
            $authError = 'Credenciais inválidas.';
        }

        if (isset($authError)) {
            throw new AuthenticationException($authError);
        }
    }
}
