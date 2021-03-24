<?php

namespace App\SocialMedias\Instagram;

use JetBrains\PhpStorm\Pure;

/**
 * Trait HelperInstagram
 *
 * @package App\SocialMedias\Instagram
 */
trait HelperInstagram
{
    public string $formatPassword = '#PWD_INSTAGRAM_BROWSER:0:%u:%s';

    /**
     * @return string
     */
    #[Pure]
    public function generateCsrfToken(): string
    {
        return md5(uniqid());
    }

    /**
     * @param  string  $password
     *
     * @return string
     */
    public function generatePasswordHash(string $password): string
    {
        return vsprintf($this->formatPassword, [time(), $password]);
    }
}
