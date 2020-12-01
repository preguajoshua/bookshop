<?php

namespace Database\Factories;

use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;

class AuthorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Author::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'initials' => $this->faker->name,
            'lastname' => $this->faker->realText(20),
            'age' => $this->faker->randomNumber(2),
            'country' => $this->faker->country,
        ];
    }
}
