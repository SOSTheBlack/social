<?php

namespace App\SocialMedias\Instagram;

use App\Entities\SocialMediaAccount;
use App\SocialMedias\Instagram\Resources\AuthResource;
use App\SocialMedias\Instagram\Resources\UserResource;
use App\SocialMedias\SocialMediaTrait;
use Illuminate\Http\Client\Factory as HttpClient;

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
     * @var SocialMediaAccount|null
     */
    public ?SocialMediaAccount $socialMediaAccount;

    /**
     * Instagram constructor.
     *
     * @param  SocialMediaAccount|null  $socialMediaAccount
     */
    public function __construct(?SocialMediaAccount $socialMediaAccount = null)
    {
        $this->socialMediaAccount = $socialMediaAccount;
    }

    /**
     * @return AuthResource
     */
    public function auth(): AuthResource
    {
        return new AuthResource($this);
    }

    /**
     * @return UserResource
     */
    public function users(): UserResource
    {
        return new UserResource($this);
    }
}
