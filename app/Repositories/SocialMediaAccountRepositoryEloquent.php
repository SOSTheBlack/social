<?php

namespace App\Repositories;

use App\Entities\SocialMediaAccount;
use App\Presenters\SocialMediaAccountPresenter;
use App\Repositories\Contracts\SocialMediaAccountRepository;
use App\Validators\SocialMediaAccountValidator;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Exceptions\RepositoryException;

/**
 * Class SocialMediaAccountRepositoryEloquent.
 *
 * @package namespace App\Repositories
 */
class SocialMediaAccountRepositoryEloquent extends BaseRepository implements SocialMediaAccountRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return SocialMediaAccount::class;
    }

    /**
     * Boot up the repository, pushing criteria.
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
        return SocialMediaAccountPresenter::class;
    }

    /**
     * Specify Validator class name
     *
     * @return string
     */
    public function validator(): string
    {
        return SocialMediaAccountValidator::class;
    }
}
