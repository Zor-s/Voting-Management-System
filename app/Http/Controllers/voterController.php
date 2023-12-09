<?php

namespace App\Http\Controllers;

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




        if ($voter && Hash::check($voter_password, $voter->voter_password)) {

            return view('dashboard', ['voter_username' => $voter_username]);

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
            return redirect('/');


        }



    }
}
