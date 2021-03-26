<?php

namespace App\Repositories;

use App\Entities\EnterpriseUser;
use App\Presenters\EnterpriseUserPresenter;
use App\Repositories\Contracts\EnterpriseUserRepository;
use App\Validators\EnterpriseUserValidator;
use Exception;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Exceptions\RepositoryException;

/**
 * Class EnterpriseUserRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class EnterpriseUserRepositoryEloquent extends BaseRepository implements EnterpriseUserRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return EnterpriseUser::class;
    }

    /**
     * Boot up the repository, pushing criteria
     *
     * @throws RepositoryException
     */
    public function boot()
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
        return EnterpriseUserValidator::class;
    }

    /**
     * Specify Presenter class name
     *
     * @return string
     */
    public function presenter(): string
    {
        return EnterpriseUserPresenter::class;
    }
}
