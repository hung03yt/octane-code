<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $category = $this->faker->randomElement(['Finance', 'Self-help', 'Entertainment', 'Politics']);
        $author = $this->faker->randomElement(['Mr. A', 'Mrs. B', 'Ms. C']);

        return [
            'name' => $this->faker->words(3, true),
            'author' => $author,
            'category' => $category,
            'synopsis' => $this->faker->text(),
        ];
    }
}
