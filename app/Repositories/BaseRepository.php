<?php


namespace App\Repositories;

use App\Repositories\Exceptions\ModelNotFoundException;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection as CollectionDatabase;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Prettus\Repository\Eloquent\BaseRepository as Repository;

/**
 * Class BaseRepository.
 *
 * @package App\Repositories
 */
abstract class BaseRepository extends Repository
{
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

        if (!$nameMethod->endsWith('OrFail')) {
            return parent::__call($method, $arguments);
        }

        $originalMethod = (string)$nameMethod->replace('OrFail', '');

        $modelResponse = $this->$originalMethod(... $arguments);

        if (is_null($modelResponse) || ($modelResponse instanceof CollectionDatabase && $modelResponse->isEmpty())) {
            throw new ModelNotFoundException('No result for model '.$this->model::class);
        }

        return $modelResponse;
    }
}