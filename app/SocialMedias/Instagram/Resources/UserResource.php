<?php

namespace App\SocialMedias\Instagram\Resources;

use App\SocialMedias\Instagram\Instagram;
use Illuminate\Http\Client\RequestException;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Str;

use function to_array;

/**
 * Class UserResource.
 *
 * @package App\SocialMedias\Instagram\Resources
 */
class UserResource
{
    /**
     * @const string
     */
    const BASE_URI = 'https://i.instagram.com';

    /**
     * @const string
     */
    const ENDPOINT_INFO = '/api/v1/users/%u/info/';

    /**
     * @var Instagram
     */
    private Instagram $instagram;

    /**
     * UserResource constructor.
     *
     * @param  Instagram  $instagram
     */
    public function __construct(Instagram $instagram)
    {
        $this->instagram = $instagram;
    }

    /**
     * @return Response
     *
     * @throws RequestException
     */
    public function me(): Response
    {
        return $this->info($this->instagram->socialMediaAccount->ref_id);
    }

    /**
     * @param  int|null  $usernameId
     *
     * @return Response
     *
     * @throws RequestException
     */
    public function info(?int $usernameId): Response
    {
        $url = vsprintf(self::BASE_URI . self::ENDPOINT_INFO, [$usernameId]);

        return $this->instagram->withHeaders($this->defineHeaders())->get($url)->throw();
    }

    /**
     * @return array
     */
    private function defineHeaders(): array
    {
        return array_merge(to_array($this->instagram->socialMediaAccount->settings->headers), [
            'referer' => Str::remove('https://', self::BASE_URI),
            'user-agent' => 'Instagram 9.5.1 (iPhone9,2; iOS 10_0_2; en_US; en-US; scale=2.61; 1080x1920) AppleWebKit/420+',
        ]);
    }
}