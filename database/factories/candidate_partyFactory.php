<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\candidate_party>
 */
class candidate_partyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "candidate_party_name"=> $this->faker->randomElement(["candidate party 1","candidate party 2","candidate party 3"]),
        ];
    }
}
