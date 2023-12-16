<?php

namespace App\Http\Controllers;

use App\Models\election;
use Illuminate\Http\Request;

class electionController extends Controller
{


    function deleteElection(){
        
        election::where('department_id', session('department_id'))->delete();
        session()->forget('election_department_name');

        return view('adminDashboard');
    }


    function addElection(Request $request)
    {
        
        $request->validate([
            'election_start' => 'required|date|after:now',
            'election_end' => 'required|date|after:election_start'
        ]);

        $election = election::create([
            'department_id' => session('department_id'),
            'election_start' => $request->election_start,
            'election_end' => $request->election_end,


        ]);

        $electionDepartmentName = election::where('department_id', session('department_id'))->first();   
        session(['election_department_name' => $electionDepartmentName->department_id]);
        return view('adminDashboard');

    }
}
