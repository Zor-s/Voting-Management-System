<?php

namespace App\Http\Controllers;

use App\Models\voter;
use Illuminate\Http\Request;

class voterController extends Controller {
    
    public function signup(Request $request) {
        
        $request->validate([

            'department_id' => 'required',
            'voter_email' => 'required',
            'voter_username' => 'required',
            'voter_age' => 'required',
            'voter_gender' => 'required',
            'voter_password' => 'required',


        ]);
        voter::create([
            'department_id' => $request->department_id,
            'voter_email' => $request->voter_email,
            'voter_username' => $request->voter_username,
            'voter_age' => $request->voter_age,
            'voter_gender' => $request->voter_gender,
            'voter_password' => $request->voter_password,

        ]);

        return 'yo';

    }
}
