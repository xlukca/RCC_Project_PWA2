<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
        /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    
    public function definition(): array
    {

        $departmentIds = [4110, 4120, 4130, 4140, 4150, 4160, 4170, 4180, 4190, 4210];

        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'department_id' => fake()->randomElement($departmentIds),
            'telephone' => fake()->numerify('+421 ### ### ###'),
        ];
    }
}
