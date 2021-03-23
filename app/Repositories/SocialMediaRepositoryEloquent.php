<?php

namespace App\Repositories;

use App\Entities\SocialMedia;
use App\Presenters\SocialMediaPresenter;
use App\Repositories\Contracts\SocialMediaRepository;
use App\Validators\SocialMediaValidator;
use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Exceptions\RepositoryException;
use Prettus\Repository\Traits\CacheableRepository;

/**
 * Class SocialMediaRepositoryEloquent.
 *
 * @method array|null firstWhereOrFail(array $where, array $columns = ['*'])
 * @method array|null createOrFail(array $attributes)
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
     *
     * @throws RepositoryException
     */
    public function boot(): void
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * Specify Presenter class name
     *
     * @return string
     */
    public function presenter(): string
    {
        return SocialMediaPresenter::class;
    }

    /**
     * Specify Validator class name
     *
     * @return string
     */
    public function validator(): string
    {
        return SocialMediaValidator::class;
    }
}
