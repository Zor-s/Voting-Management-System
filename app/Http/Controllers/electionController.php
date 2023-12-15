<?php

namespace App\Http\Controllers;

use App\Models\election;
use Illuminate\Http\Request;

class electionController extends Controller
{
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

        $electionName = election::where('department_id', session('department_id'))->first();
        
        // find(session('department_id'));
        session(['election_name' => $electionName->department_id]);
        return view('adminDashboard');;

    }
}
