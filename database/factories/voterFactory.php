<?php

namespace Database\Factories;

use App\Models\department;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\voter>
 */
class voterFactory extends Factory
{


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $departmentId = department::pluck('id');
        $randomDepartmentId = $departmentId->random();

        return [
            'department_id' => $randomDepartmentId,
            'voter_username' => fake()->name(),
            'voter_password' => Hash::make('password'),
            'voter_email' => fake()->unique()->safeEmail(),
            'voter_gender' => $this->faker->randomElement(['male', 'female']),
            'voter_age' => fake()->randomDigit(),
        ];
    }
}
