<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->realText(20),
            'isbn' => $this->faker->unique()->randomNumber(8),
            'authors_id' => $this->faker->randomNumber(2),
            'pages' =>  $this->faker->unique()->randomNumber(3),
        ];
    }
}
