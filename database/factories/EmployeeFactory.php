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

        $departmentIds = [4180, 4310, 4260, 4110, 4230, 4280, 4380, 4290, 4150, 4250, 4160, 4220, 4190, 4120, 4330, 4240, 4270, 4630, 4360, 4140, 4130, 4170, 4210, 4340, 4370];

        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'department_id' => fake()->randomElement($departmentIds),
            'telephone' => fake()->numerify('+421 ### ### ###'),
        ];
    }
}
