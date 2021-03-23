<?php
/** @noinspection PhpMissingFieldTypeInspection */

namespace App\Validators;

use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\LaravelValidator;

/**
 * Class SocialMediaValidator.
 *
 * @package namespace App\Validators;
 */
class SocialMediaValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'name' => ['required', 'string', 'max:255', 'min:3'],
            'slug' => ['required', 'string', 'max:255', 'min:3'],
            'description' => ['required', 'string', 'min:3']
        ],
        ValidatorInterface::RULE_UPDATE => [
            'name' => ['string', 'max:255', 'min:3'],
            'slug' => ['string', 'max:255', 'min:3'],
            'description' => ['string', 'min:3']
        ],
    ];
}
