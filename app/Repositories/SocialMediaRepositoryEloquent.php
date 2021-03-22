<?php

namespace App\Repositories;

use App\Entities\SocialMedia;
use App\Repositories\Contracts\SocialMediaRepository;
use App\Validators\SocialMediaValidator;
use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Traits\CacheableRepository;

/**
 * Class SocialMediaRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class SocialMediaRepositoryEloquent extends BaseRepository implements SocialMediaRepository, CacheableInterface
{
    use CacheableRepository;

    /**
     * Time of cache.
     *
     * @var int
     */
    protected int $cacheMinutes = 1080;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return SocialMedia::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
