<?php

namespace App\Http\Components\Settings\SocialMedias\Instagram;

use JetBrains\PhpStorm\ArrayShape;

use function App\SocialMedias\Instagram\generateCsrfToken;

/**
 * Trait NewInstagramTrait.
 *
 * @package App\Http\Components\Settings\SocialMedias\Instagram
 */
trait NewInstagramTrait
{
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