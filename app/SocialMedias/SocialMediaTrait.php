<?php


namespace App\SocialMedias;

use App\Entities\SocialMedia;
use App\Repositories\Contracts\SocialMediaRepository;

/**
 * Trait SocialMediaTrait.
 *
 * @package App\SocialMedias
 */
trait SocialMediaTrait
{
    /**
     * @param  string|null  $slug
     *
     * @return SocialMedia
     */
    public function socialMedia(?string $slug = null): SocialMedia
    {
        return app(SocialMediaRepository::class)->findWhere(['slug' => $slug ?? self::SLUG]);
    }
}