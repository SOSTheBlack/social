<?php

namespace App\Transformers;

use App\Entities\Enterprise;
use JetBrains\PhpStorm\ArrayShape;
use League\Fractal\TransformerAbstract;

/**
 * Class EnterpriseTransformer.
 *
 * @package namespace App\Transformers;
 */
class EnterpriseTransformer extends TransformerAbstract
{
    /**
     * Transform the Enterprise entity.
     *
     * @param  Enterprise  $enterprise
     *
     * @return array
     */
    #[ArrayShape([
        'id' => "int",
        'name' => "string",
        'created_at' => "\Illuminate\Support\Carbon|null",
        'updated_at' => "\Illuminate\Support\Carbon|null",
        'deleted_at' => "\Illuminate\Support\Carbon|null"
    ])]
    public function transform(Enterprise $enterprise): array
    {
        return [
            'id' => $enterprise->id,
            'name' => $enterprise->name,
            'created_at' => $enterprise->created_at?->toW3cString(),
            'updated_at' => $enterprise->updated_at?->toW3cString(),
            'deleted_at' => $enterprise->deleted_at?->toW3cString()
        ];
    }
}
