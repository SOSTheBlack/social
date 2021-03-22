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
    /**
     * @return string
     */
    #[Pure]
    protected function generateCsrfToken(): string
    {
        return md5(uniqid());
    }
}
