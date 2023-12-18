<?php

namespace Database\Factories;

use App\Models\department;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\election>
 */
class electionFactory extends Factory
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
            'department_id'=> 1,
            "election_start"=> fake()->dateTime(),
            "election_end"=> fake()->dateTime(),

        ];
    }
}
