<?php

namespace Database\Factories;

use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'serial_number' => $this->faker->unique()->bothify('SN-####'),
            'published_at' => $this->faker->optional()->dateTimeThisDecade(),
            'author_id' => Author::inRandomOrder()->first()->id,
        ];
    }
}
