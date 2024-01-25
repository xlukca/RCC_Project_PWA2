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
            'year_of_order' => fake()->numberBetween(2023, 2024),
            'month_of_order' => str_pad(fake()->numberBetween(01, 12), 2, '0', STR_PAD_LEFT),
            'day_of_order' => str_pad(fake()->numberBetween(01, 31), 2, '0', STR_PAD_LEFT),
        ];
    }
}
