<?php

namespace App\Repositories;

use App\Repositories\Contracts\RepositoryContract;
use App\Repositories\Exceptions\ModelNotFoundException;
use Illuminate\Database\Eloquent\Collection as CollectionDatabase;
use Illuminate\Support\Str;
use Prettus\Repository\Eloquent\BaseRepository as Repository;
use Prettus\Repository\Exceptions\RepositoryException;

/**
 * Class BaseRepository.
 *
 * @package App\Repositories
 *
 * @method findOrFail($id, $columns = ['*'])
 * @method  firstWhereOrFail(array $where, array $columns = ['*'])
 * @method  createOrFail(array $attributes)
 *
 */
abstract class BaseRepository extends Repository implements RepositoryContract
{
    /**
     * @param  array  $where
     * @param  array|string[]  $columns
     *
     * @return mixed
     *
     * @throws RepositoryException
     */
    public function firstWhere(array $where, array $columns = ['*']): mixed
    {
        $this->applyCriteria();
        $this->applyScope();

        $this->applyConditions($where);

        $model = $this->model->first($columns);
        $this->resetModel();

        return $this->parserResult($model);
    }

    /**
     * Trigger method calls to the model
     *
     * @param  string  $method
     * @param  array  $arguments
     *
     * @return mixed
     *
     * @noinspection PhpMissingParamTypeInspection
     */
    public function __call($method, $arguments): mixed
    {
        $nameMethod = Str::of($method);

        if (! $nameMethod->endsWith('OrFail')) {
            return parent::__call($method, $arguments);
        }

        $originalMethod = (string)$nameMethod->replace('OrFail', '');

        $modelResponse = $this->$originalMethod(... $arguments);

        if (is_null($modelResponse) || ($modelResponse instanceof CollectionDatabase && $modelResponse->isEmpty())) {
            throw new ModelNotFoundException('No result for model ' . $this->model::class);
        }

        return $modelResponse;
    }
}