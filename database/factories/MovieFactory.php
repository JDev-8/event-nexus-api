<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    public function definition(): array
    {
        return [
          'title' => $this->faker->sentence(3),
          'synopsis' => $this->faker->paragraph(),
          'poster_url' => $this->faker->imageUrl(),
          'duration_minutes' => $this->faker->numberBetween(60, 180),
        ];
    }
}
