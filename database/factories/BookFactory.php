<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Book>
 */
class BookFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => ucwords(fake()->words(2, true)),
            'description' => fake()->text,
            'page' => fake()->numberBetween(1, 1000),
            'language' => fake()->languageCode,
        ];
    }
}
