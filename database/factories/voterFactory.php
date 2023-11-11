<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Faker\Generator as Faker;

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
        $faker = app(Faker::class);

        return [
            'department_id' => fake()->randomDigit(),
            'voter_username' => fake()->name(),
            'voter_password' => static::$password ??= Hash::make('password'),
            'voter_email' => fake()->unique()->safeEmail(),
            'voter_gender' => $faker->randomElement(['male', 'female']),
            'voter_age' => fake()->randomDigit(),
        ];
    }
}
