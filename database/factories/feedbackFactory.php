<?php

namespace Database\Factories;

use App\Models\voter;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\feedback>
 */
class feedbackFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $voterId = voter::pluck('id');
        $randomVoterId = $voterId->random();
        return [
            'voter_id'=> $randomVoterId,
            'feedback_rating'=> fake()->randomDigit()+1,
            'feedback_comment'=> fake()->sentence(),
        ];
    }
}
