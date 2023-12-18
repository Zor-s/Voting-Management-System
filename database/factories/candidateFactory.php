<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\position;
use App\Models\candidate_party;
use App\Models\department;
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
        $positionId = position::pluck('id');
        $randomPositionId = $positionId->random();

        $candidatePartyId = candidate_party::pluck('id');
        $randomCandidatePartyId = $candidatePartyId->random();

        $departmentId = department::pluck('id');
        $randomDepartmentId = $departmentId->random();

        return [
            'position_id'=> $randomPositionId,
            'candidate_party_id'=> $randomCandidatePartyId,
            'department_id'=> $randomDepartmentId,
            "candidate_full_name"=> fake()->name(),

        ];
    }
}
