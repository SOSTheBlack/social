<?php

namespace App\Transformers;

use App\Entities\Model;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class TransformerAbstract.
 *
 * @package App\Transformers
 */
abstract class TransformerAbstract extends \League\Fractal\TransformerAbstract
{
    /**
     * @param  array  $relations
     *
     * @return void
     */
    protected function relationship(array $relations): void
    {
        foreach ($relations as $keyRelation => $relation) {
                $availableIncludes = array_flip($this->availableIncludes);

            if ($relation instanceof Collection) {
                $this->parse[$keyRelation] = $this->collection($relation->toArray(), $availableIncludes[$keyRelation])->getData();
            } elseif ($relation instanceof Model) {
                $this->parse[$keyRelation] = $this->item($relation->toArray(), $availableIncludes[$keyRelation])->getData();
            }
        }
    }
}