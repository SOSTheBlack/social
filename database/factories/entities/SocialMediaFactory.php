<?php

namespace Database\Factories;

use App\Entities\SocialMedia;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * Class SocialMediaFactory.
 *
 * @package Database\Factories
 */
class SocialMediaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SocialMedia::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->firstName;

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => $this->faker->text(255)
        ];
    }
}
