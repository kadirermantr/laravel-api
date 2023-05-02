<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Category>
 */
class AuthorFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => ucwords(fake()->name),
            'biography' => fake()->paragraph,
        ];
    }
}
