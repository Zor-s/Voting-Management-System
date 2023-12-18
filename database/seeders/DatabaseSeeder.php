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
        \App\Models\Department::factory()->count(5)->sequence(
            ['department_name' => 'Institute of Applied and Aquatic Sciences (IAAS)'],
            ['department_name' => 'Institute of Computing (IC)'],
            ['department_name' => 'Institute of Leadership, Entrepreneurship and Good Governance (ILEGG)'],
            ['department_name' => 'Institute of Teacher Education (ITED)'],
            ['department_name' => 'Institute of Advanced Studies (IADS)'],
        )->create();
        \App\Models\admin::factory(1)->create();

        \App\Models\voter::factory(1)->create();

        \App\Models\position::factory(10)->create();
        \App\Models\candidate_party::factory(10)->create();
        \App\Models\candidate::factory(10)->create();
        \App\Models\election::factory(1)->create();
        // \App\Models\ballot::factory(10)->create();
        // \App\Models\feedback::factory(10)->create();
        // \App\Models\voting_result::factory(10)->create();


        // \App\Models\User::factory(10)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
