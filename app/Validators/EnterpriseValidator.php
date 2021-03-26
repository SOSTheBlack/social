<?php

namespace App\Validators;

use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\LaravelValidator;

/**
 * Class EnterpriseValidator.
 *
 * @package namespace App\Validators;
 */
class EnterpriseValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'name' => ['required', 'string', 'min:3', 'max:255']
        ],
        ValidatorInterface::RULE_UPDATE => [
            'name' => ['string', 'min:3', 'max:255'],
            'document_type' => ['string', 'enun:cpf,cnpj'],
            'document_number' => ['int']
        ],
    ];
}
