<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\voter>
 */
class voterFactory extends Factory
{
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'department_id' => fake()->randomDigit(),
            'voter_username' => fake()->name(),
            'voter_password' => static::$password ??= Hash::make('password'),
            'voter_email' => fake()->unique()->safeEmail(),
            'voter_gender' => $this->faker->randomElement(['male', 'female']),
            'voter_age' => fake()->randomDigit(),
        ];
    }
}
