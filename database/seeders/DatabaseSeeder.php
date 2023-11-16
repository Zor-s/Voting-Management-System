<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\position::factory(10)->create();
        \App\Models\candidate_party::factory(10)->create();
        \App\Models\department::factory(10)->create();
        \App\Models\candidate::factory(10)->create();
        \App\Models\admin::factory(10)->create();
        \App\Models\voter::factory(10)->create();
        \App\Models\election::factory(10)->create();
        \App\Models\ballot::factory(10)->create();
        \App\Models\feedback::factory(10)->create();
        \App\Models\voting_result::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
