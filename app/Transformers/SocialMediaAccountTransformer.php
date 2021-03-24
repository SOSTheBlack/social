<?php

namespace App\Transformers;

use App\Entities\SocialMediaAccount;
use JetBrains\PhpStorm\ArrayShape;
use League\Fractal\TransformerAbstract;

/**
 * Class SocialMediaAccountTransformer.
 *
 * @package namespace App\Transformers;
 */
class SocialMediaAccountTransformer extends TransformerAbstract
{
    /**
     * Transform the SocialMediaAccount entity.
     *
     * @param  SocialMediaAccount  $socialMediaAccount
     *
     * @return array
     */
    #[ArrayShape([
        'id' => "int",
        'enterprise_id' => "int",
        'social_media_id' => "int",
        'ref_id' => "int",
        'username' => "int",
        'settings' => "object",
        'created_at' => "string",
        'updated_at' => "string",
        'deleted_at' => "string"
    ])]
    public function transform(SocialMediaAccount $socialMediaAccount): array
    {
        return [
            'id' => (int)$socialMediaAccount->id,
            'enterprise_id' => (int)$socialMediaAccount->enterprise_id,
            'social_media_id' => (int)$socialMediaAccount->social_media_id,
            'ref_id' => (int) $socialMediaAccount->ref_id,
            'username' => (int)$socialMediaAccount->social_media_id,
            'settings' => $socialMediaAccount->settings,
            'created_at' => $socialMediaAccount->created_at->toW3cString(),
            'updated_at' => $socialMediaAccount->updated_at->toW3cString(),
            'deleted_at' => optional($socialMediaAccount->deleted_at)->toW3cString()
        ];
    }
}
