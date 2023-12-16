<?php

namespace Database\Factories;

use App\Models\department;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\admin>
 */
class adminFactory extends Factory
{
    // protected static ?string $password;
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
            // "department_id"=> $randomDepartmentId,
            // "admin_username"=> fake()->name,
            // "admin_password"=> Hash::make('password'),

            "department_id"=> 1,
            "admin_username"=> 'a',
            "admin_password"=> Hash::make('a'),
        ];
    }
}
