<?php

namespace App\Http\Controllers;

use App\Models\candidate;
use App\Models\candidate_party;
use App\Models\department;
use App\Models\election;
use App\Models\position;
use App\Models\voter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;



class voterController extends Controller
{


    public function login(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'voter_username' => 'required',
            'voter_password' => 'required',
        ]);

        // Extract input values from the request
        $department_id = $request->input('department_name');
        $voter_username = $request->input('voter_username');
        $voter_password = $request->input('voter_password');

        $voter = voter::where('voter_username', $voter_username)
            ->where('department_id', $department_id)
            ->first();

        $departmentName = department::find($department_id);

        // Store voter-related information in the session
        session(['voter_username' => $voter_username, 'department_name' => $departmentName->department_name, 'department_id' => $department_id]);

        $electionDepartmentName = election::where('department_id', session('department_id'))->first();

        // Check if the provided credentials are valid
        if ($voter && Hash::check($voter_password, $voter->voter_password)) {
            // Store the election department ID in the session
            if ($electionDepartmentName) {
                session(['election_department_id' => $electionDepartmentName->department_id]);
            } else {
                session(['election_department_id' => 0]);
            }

            $election = election::where('department_id', session('department_id'))->first();

            // Store election start and end dates in the session
            if ($election) {
                session(['election_start' => $election->election_start, 'election_end' => $election->election_end]);
            } else {
                session(['election_start' => 0, 'election_end' => 0]);
            }

            $positions = position::all();
            $candidates = candidate::all();
            $candidate_parties = candidate_party::all();

            // Store positions, candidates, and candidate parties in the session
            session(['positions' => $positions, 'candidates' => $candidates, 'candidate_parties' => $candidate_parties]);

            // Retrieve voter ID and store it in the session
            $voter_id = voter::where('voter_username', $voter_username)->first();
            session(['voter_id' => $voter_id->id]);

            // Retrieve voter information and store has_voted status in the session
            $voter = voter::find(session('voter_id'));
            session(['has_voted' => $voter->has_voted]);

            // Retrieve voter information and store has_feedback status in the session
            $voter = voter::find(session('voter_id'));
            session(['has_feedback' => $voter->has_feedback]);

            // Redirect to the dashboard view upon successful login
            return view('dashboard');
        } else {
            // Redirect to the homepage if the login credentials are invalid
            return redirect('/');
        }
    }



    public function signup(Request $request)
    {

        // Validate user input
        $request->validate([
            'department_name' => 'required',
            'voter_email' => 'required',
            'voter_username' => 'required',
            'voter_age' => 'required',
            'voter_gender' => 'required',
            'voter_password' => 'required',
        ]);

        // Create a new voter record in the database
        $voter = voter::create([
            'department_id' => $request->department_name,
            'voter_email' => $request->voter_email,
            'voter_username' => $request->voter_username,
            'voter_age' => $request->voter_age,
            'voter_gender' => $request->voter_gender,
            'voter_password' => Hash::make($request->voter_password),
        ]);

        // Check if voter creation was successful
        if ($voter) {
            // Display a success message and redirect to the login page
            echo '<script>alert("Account created successfully!")</script>';
            return view('login');
        }

    }




}
