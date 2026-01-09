<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TicketType>
 */
class TicketTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement(['VIP', 'General', 'Early Bird', 'Backstage']),
            'price' => fake()->randomFloat(2, 20, 500),
            'quantity' => fake()->numberBetween(50, 200),
            'sale_start_date' => now(),
        ];
    }
}
