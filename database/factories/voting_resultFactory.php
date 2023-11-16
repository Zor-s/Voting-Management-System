<?php

namespace Database\Factories;

use App\Models\ballot;
use App\Models\candidate;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\voting_result>
 */
class voting_resultFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $ballotId = ballot::pluck('id');
        $randomBallotId = $ballotId->random();

        $candidateId = candidate::pluck('id');
        $randomCandidateId = $candidateId->random();

        return [
            'ballot_id'=> $randomBallotId,
            'candidate_id'=> $randomCandidateId,
            'number_of_votes'=> fake()->randomNumber(),
        ];
    }
}
