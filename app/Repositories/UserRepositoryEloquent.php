<?php

namespace App\Repositories;

use App\Entities\User;
use App\Presenters\UserPresenter;
use App\Repositories\Contracts\UserRepository;
use App\Validators\UserValidator;
use Exception;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Exceptions\RepositoryException;

/**
 * Class UserRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return User::class;
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
     * Specify Validator class.
     *
     * @return string
     *
     * @throws Exception
     */
    public function validator(): string
    {
        return UserValidator::class;
    }

    /**
     * Specify Presenter class name.
     *
     * @return string
     */
    public function presenter(): string
    {
        return UserPresenter::class;
    }
}
