<?php

namespace App\Transformers;

use App\Entities\EnterpriseUser;
use JetBrains\PhpStorm\ArrayShape;
use League\Fractal\TransformerAbstract;

/**
 * Class EnterpriseUserTransformer.
 *
 * @package namespace App\Transformers;
 */
class EnterpriseUserTransformer extends TransformerAbstract
{
    /**
     * Transform the EnterpriseUser entity.
     *
     * @param  EnterpriseUser  $model
     *
     * @return array
     */
    #[ArrayShape([
        'user_id' => "string",
        'enterprise_id' => "string",
        'created_at' => "string",
        'updated_at' => "string",
        'deleted_at' => "mixed"
    ])]
    public function transform(EnterpriseUser $model): array {
        return [
            'user_id' => $model->user_id,
            'enterprise_id' => $model->enterprise_id,
            'created_at' => $model->created_at?->toW3cString(),
            'updated_at' => $model->updated_at?->toW3cString(),
            'deleted_at' => $model->deleted_at?->toW3cString()
        ];
    }
}
