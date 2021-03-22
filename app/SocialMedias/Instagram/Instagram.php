<?php

namespace App\SocialMedias\Instagram;

use App\SocialMedias\Instagram\Resources\AuthResource;
use App\SocialMedias\SocialMediaTrait;
use Illuminate\Http\Client\Factory as HttpClient;
use JetBrains\PhpStorm\Pure;

/**
 * Class Instagram.
 *
 * @package App\SocialMedias\Instagram
 */
class Instagram extends HttpClient implements InstagramContract
{
    use HelperInstagram;
    use SocialMediaTrait;

    /**
     * @return AuthResource
     */
    #[Pure]
    public function auth(): AuthResource
    {
        return new AuthResource($this);
    }
}
