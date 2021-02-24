<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Contracts\EnterpriseRepository;
use App\Entities\Enterprise;
use App\Validators\EnterpriseValidator;

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
    public function model()
    {
        return Enterprise::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
