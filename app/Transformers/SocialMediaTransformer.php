<?php

namespace App\Transformers;

use App\Entities\SocialMedia;
use JetBrains\PhpStorm\ArrayShape;
use League\Fractal\TransformerAbstract;

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
     * @param  SocialMedia  $socialMedia
     *
     * @return array
     */
    #[ArrayShape([
        'id' => "int",
        'name' => "string",
        'slug' => "string",
        'description' => "string",
        'created_at' => "string",
        'updated_at' => "string",
        'deleted_at' => "string"
    ])]
    public function transform(SocialMedia $socialMedia): array
    {
        return $socialMedia->toArray();

        return [
            'id' => (int)$socialMedia->id,
            'name' => $socialMedia->name,
            'slug' => $socialMedia->slug,
            'description' => $socialMedia->description,
            'created_at' => $socialMedia->created_at->toW3cString(),
            'updated_at' => $socialMedia->updated_at->toW3cString(),
            'deleted_at' => $socialMedia->deleted_at->toW3cString()
        ];
    }
}
