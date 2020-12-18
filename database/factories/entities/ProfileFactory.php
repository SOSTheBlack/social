<?php

namespace Database\Factories\Entities;

use App\Entities\Profile;
use App\Entities\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Class ProfileFactory
 *
 * @package Database\Factories
 * @mixin Profile
 */
class ProfileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Profile::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
             'avatar' => 'ddd'
        ];
    }
}
