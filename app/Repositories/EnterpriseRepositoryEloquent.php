<?php

namespace App\Repositories;

use App\Entities\Enterprise;
use App\Presenters\EnterprisePresenter;
use App\Repositories\Contracts\EnterpriseRepository;
use App\Repositories\Contracts\EnterpriseUserRepository;
use App\Validators\EnterpriseValidator;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Exceptions\RepositoryException;

/**
 * Class EnterpriseRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class EnterpriseRepositoryEloquent extends BaseRepository implements EnterpriseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return Enterprise::class;
    }

    /**
     * Boot up the repository, pushing criteria.
     *
     * @throws RepositoryException
     */
    public function boot()
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
        return EnterprisePresenter::class;
    }

    /**
     * Specify Validator class name of Prettus\Validator\Contracts\ValidatorInterface
     *
     * @return string
     */
    public function validator(): string
    {
        return EnterpriseValidator::class;
    }

    /**
     * Create a new enterprise based in User model data.
     *
     * @param  array  $user User data.
     *
     * @return array
     */
    public function createByUser(array $user): array
    {
        $enterpriseName = vsprintf('%s %s', [$user['name'], __(self::SUFFIX_ENTERPRISE)]);
        $enterprise = $this->createOrFail(['name' =>  $enterpriseName]);

        app(EnterpriseUserRepository::class)->createOrFail(['user_id' => $user['id'], 'enterprise_id' => $enterprise['id']]);

        return $enterprise;
    }
}
