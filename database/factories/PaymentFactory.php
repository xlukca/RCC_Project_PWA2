<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employee_id' => fake()->unique()->numberBetween(1, 250),
            'income' => fake()->numerify('#.##'),
            'date_of_income' => fake()->dateTimeBetween('2023-01-01', '2024-1-25')->format('Y-m-d'),
        ];
    }
}
