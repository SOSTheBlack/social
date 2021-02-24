<?php

namespace App\Services\Instagram;

use JetBrains\PhpStorm\Pure;

/**
 * Trait HelperInstagram
 *
 * @package App\Services\Instagram
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
