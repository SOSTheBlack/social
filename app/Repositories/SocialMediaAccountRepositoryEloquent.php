<?php

namespace App\Repositories;

use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Contracts\SocialMediaAccountRepository;
use App\Entities\SocialMediaAccount;
use App\Validators\SocialMediaAccountValidator;

/**
 * Class SocialMediaAccountRepositoryEloquent.
 *
 * @package namespace App\Repositories
 *
 * @method   firstWhereOrFail(array $where, array $columns = ['*'])
 */
class SocialMediaAccountRepositoryEloquent extends BaseRepository implements SocialMediaAccountRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return SocialMediaAccount::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
