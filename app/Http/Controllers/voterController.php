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
        $request->validate([
            'voter_username' => 'required',
            'voter_password' => 'required',

        ]);
        $department_id = $request->input('department_name');
        $voter_username = $request->input('voter_username');
        $voter_password = $request->input('voter_password');

        $voter = voter::where('voter_username', $voter_username)
            ->where('department_id', $department_id)
            ->first();

            $departmentName = department::find($department_id);

            session(['voter_username' => $voter_username, 'department_name' => $departmentName->department_name, 'department_id' => $department_id]);
    
            $electionDepartmentName = election::where('department_id', session('department_id'))->first();
    


        if ($voter && Hash::check($voter_password, $voter->voter_password)) {

            if ($electionDepartmentName) {
                // do something with $electionDepartmentName->department_id
                session(['election_department_id' => $electionDepartmentName->department_id]);
            } else {
                // do something else if no election was found
                session(['election_department_id' => 0]);
            }


            $election = election::where('department_id',session('department_id'))->first();

            if ($election) {
                # code...
                session(['election_start' => $election->election_start, 'election_end' => $election->election_end]);
            }else {
                # code...
                session(['election_start' => 0, 'election_end' => 0]);

            }


            $positions = position::all();
            $candidates = candidate::all();
            $candidate_parties = candidate_party::all();

            

            session(['positions' => $positions, 'candidates' => $candidates, 'candidate_parties' => $candidate_parties]);


            $voter_id = voter::where('voter_username', $voter_username)->first();
            session(['voter_id'=>$voter_id->id]);
            $voter = voter::find(session('voter_id'));
            session(['has_voted' => $voter->has_voted]);



            $voter = voter::find(session('voter_id'));
            session(['has_feedback' => $voter->has_feedback]);

            return view('dashboard');
        } else {

            return redirect('/');
        }


    }







    public function signup(Request $request)
    {

        $request->validate([

            'department_name' => 'required',
            'voter_email' => 'required',
            'voter_username' => 'required',
            'voter_age' => 'required',
            'voter_gender' => 'required',
            'voter_password' => 'required',


        ]);

        $voter = voter::create([
            'department_id' => $request->department_name,
            'voter_email' => $request->voter_email,
            'voter_username' => $request->voter_username,
            'voter_age' => $request->voter_age,
            'voter_gender' => $request->voter_gender,
            'voter_password' => Hash::make($request->voter_password),

        ]);


        if ($voter) {
            echo '<script>alert("Account created successfully!")</script>';
            return view('login');
        }

    }





    
}
