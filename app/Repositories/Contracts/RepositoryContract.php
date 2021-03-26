<?php


namespace App\Repositories\Contracts;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class RepositoryContract.
 *
 * @method firstWhereOrFail(array $where, array $columns = ['*'])
 * @method createOrFail(array $attributes)
 *
 * @package App\Repositories\Contracts
 */
interface RepositoryContract extends RepositoryInterface
{

}