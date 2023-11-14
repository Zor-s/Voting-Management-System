<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\position as position;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\candidate>
 */
class candidateFactory extends Factory
{
    
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $userIDs = position::pluck('id');
        $randomUserID = $userIDs->random();

        return [
            'position_id'=> $randomUserID,
            "candidate_first_name"=> $this->faker->word,
        ];
    }
}
