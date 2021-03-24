<?php

namespace App\Http\Components\Settings\SocialMedias\Instagram;

use App\SocialMedias\Instagram\Exceptions\AuthenticationException;
use App\SocialMedias\Instagram\Instagram;
use Illuminate\Http\Client\Response;
use JetBrains\PhpStorm\ArrayShape;

use Prettus\Validator\Exceptions\ValidatorException;
use Throwable;

use function App\SocialMedias\Instagram\generateCsrfToken;

/**
 * Trait NewInstagramTrait.
 *
 * @package App\Http\Components\Settings\SocialMedias\Instagram
 */
trait NewInstagramTrait
{
    /**
     * @return Response
     *
     * @throws AuthenticationException
     */
    protected function singInInstagram(): Response
    {
        try {
            return (new Instagram())->auth()->login($this->username, $this->password);
        } catch (Throwable $exception) {
            $isAuthenticationException = $exception instanceof AuthenticationException;

            $this->addError(
                'error',
                $isAuthenticationException ? $exception->getMessage() : __('Erro inesperado. Tente novamente!')
            );

            throw new AuthenticationException($exception->getMessage(), previous: $exception);
        }
    }

    /**
     * @param  Response  $responseLogin
     *
     * @return array
     *
     * @throws AuthenticationException
     */
    protected function createAccount(Response $responseLogin): array
    {
        try {
            return $this->createSocialMediaAccount($responseLogin);
        } catch (Throwable $exception) {
            if ($exception instanceof ValidatorException) {
                foreach ($exception->getMessageBag()->toArray() as $field => $errors) {
                    $this->addError('error', end($errors));
                }
            }

            throw new AuthenticationException($exception->getMessage(), previous: $exception);
        }
    }

    /**
     * @param  Response  $responseLogin
     *
     * @return array
     */
    private function createSocialMediaAccount(Response $responseLogin): array
    {
        $body = $responseLogin->object();
        $headers = $this->structureHeaders($responseLogin->cookies()->toArray());

        $socialMedia = $this->socialMediaRepository->firstWhereOrFail(['slug' => Instagram::SLUG], ['id']);

        $newSocialMediaAccount = [
            'social_media_id' => $socialMedia['id'],
            'enterprise_id' => app('auth')->user()->enterprise->id,
            'ref_id' => $body->userId,
            'username' => $this->username,
            'settings' => [
                'headers' => $headers,
                'password' => encrypt($this->password)
            ]
        ];

        return $this->socialMediaAccountRepository->createOrFail($newSocialMediaAccount);
    }

    /**
     * @param  array  $headers
     *
     * @return array
     */
    #[ArrayShape([
        'cookie' => "int|string",
        'referer' => "string",
        'x-csrftoken' => "mixed|string",
        'user-agent' => "string"
    ])]
    protected function structureHeaders(array $headers): array
    {
        $cookies = collect($headers);
        $cookieString = '';

        foreach ($cookies as $cookie) {
            $cookieString .= vsprintf('; %s=%s', [$cookie['Name'], $cookie['Value']]);

            if ($cookie['Name'] === 'csrftoken') {
                $csrftoken = $cookie['Value'];
            }
        }

        $headers = [
            'cookie' => $cookieString ?? 1,
            'referer' => 'https://www.instagram.com/',
            'x-csrftoken' => $csrftoken ?? generateCsrfToken(),
            'user-agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4421.5 Safari/537.36',
        ];

        return $headers;
    }
}