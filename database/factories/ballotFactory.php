<?php

namespace Database\Factories;

use App\Models\candidate;
use App\Models\voter;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ballot>
 */
class ballotFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $candidateId = candidate::pluck('id');
        $randomCandidateId = $candidateId->random();
        
        $voterId = voter::pluck('id');
        $randomVoterId = $voterId->random();
        return [
                'candidate_id'=> $randomCandidateId,
                'voter_id'=> $randomVoterId,
        ];
    }
}
