<?php

namespace App\SocialMedias\Facebook;

/**
 * Interface FacebookContract.
 *
 * @package App\SocialMedias\Facebook
 */
interface FacebookContract
{
    /**
     * Name of integration.
     *
     * @string
     */
    public const NAME = 'Facebook';

    /**
     * Slug of integration.
     *
     * @string
     */
    public const SLUG = 'facebook';
}