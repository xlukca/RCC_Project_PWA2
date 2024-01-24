<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CoffeeConsumption>
 */
class CoffeeConsumptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employee_id' => fake()->numberBetween(1, 250),
            'date_of_order' => fake()->dateTimeBetween('2023-01-01', '2024-1-25')->format('Y-m-d'),
        ];
    }
}
