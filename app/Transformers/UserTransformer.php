<?php

namespace App\Transformers;

use App\Entities\User;
use JetBrains\PhpStorm\ArrayShape;
use League\Fractal\Resource\Collection;

/**
 * Class UserTransformer.
 *
 * @package namespace App\Transformers;
 */
class UserTransformer extends TransformerAbstract
{
    /**
     * Resources that can be included if requested.
     *
     * @var array
     */
    protected $availableIncludes = [EnterpriseTransformer::class => 'enterprises'];

    /**
     * @var array
     */
    protected array $parse;

    /**
     * Transform the User entity.
     *
     * @param  User  $model
     *
     * @return array
     */
    #[ArrayShape([
        'id' => "int",
        'name' => "string",
        'email' => "string",
        'email_verified_at' => "string",
        'created_at' => "string",
        'updated_at' => "string",
        'deleted_at' => "string"
    ])]
    public function transform(User $model): array {
        $this->parse =  [
            'id' => $model->id,
            'name' => $model->name,
            'email' => $model->email,
            'email_verified_at' => $model->email_verified_at?->toW3cString(),
            'created_at' => $model->created_at->toW3cString(),
            'updated_at' => $model->updated_at->toW3cString(),
            'deleted_at' => $model->deleted_at?->toW3cString()
        ];

        $this->relationship($model->getRelations());

        return $this->parse;
    }

    /**
     * @param  User  $user
     *
     * @return Collection|null
     */
    public function includeEnterprises(User $user): ?Collection
    {
        if ($user->enterprises) {
            return $this->collection($user->enterprises, new EnterpriseTransformer());
        } else {
            return null;
        }
    }
}
