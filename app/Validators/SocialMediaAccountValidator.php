<?php

namespace App\Validators;

use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\LaravelValidator;

/**
 * Class SocialMediaAccountValidator.
 *
 * @package namespace App\Validators;
 */
class SocialMediaAccountValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'id' => ['string', 'uuid'],
            'enterprise_id' => ['required', 'string', 'uuid', 'exists:\App\Entities\Enterprise,id'],
            'social_media_id' => ['required', 'string', 'uuid', 'exists:\App\Entities\SocialMedia,id'],
            'ref_id' => ['required', 'int', 'unique:\App\Entities\SocialMediaAccount,ref_id'],
            'username' => ['required', 'string']
        ],
        ValidatorInterface::RULE_UPDATE => [
            'id' => ['string', 'uuid'],
            'enterprise_id' => ['int', 'string', 'uuid', 'exists:\App\Entities\Enterprise,id'],
            'social_media_id' => ['int', 'string', 'uuid', 'exists:\App\Entities\SocialMedia,id'],
            'ref_id' => ['int'],
            'username' => ['string']
        ],
    ];
}
