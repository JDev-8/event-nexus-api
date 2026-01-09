<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(4),
            'location' => fake()->city(). ', '. fake()->streetAddress(),
            'start_date' => fake()->dateTimeBetween('+1 week', '+2 weeks'),
            'end_date' => fake()->dateTimeBetween('+2 weeks', '+3 weeks'),
            'is_published' => true,
        ];
    }
}
