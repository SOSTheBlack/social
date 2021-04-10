<?php

namespace App\SocialMedias\Twitter;

/**
 * Interface TwitterContract.
 *
 * @package App\SocialMedias\Twitter
 */
interface TwitterContract
{
    /**
     * Name of integration.
     *
     * @string
     */
    public const NAME = 'Twitter';

    /**
     * Slug of integration.
     *
     * @string
     */
    public const SLUG = 'twitter';
}