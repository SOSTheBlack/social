<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\SocialMedia;

/**
 * Class SocialMediaTransformer.
 *
 * @package namespace App\Transformers;
 */
class SocialMediaTransformer extends TransformerAbstract
{
    /**
     * Transform the SocialMedia entity.
     *
     * @param \App\Entities\SocialMedia $model
     *
     * @return array
     */
    public function transform(SocialMedia $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
