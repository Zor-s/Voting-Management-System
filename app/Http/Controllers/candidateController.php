<?php

namespace App\Http\Controllers;

use App\Models\candidate;
use App\Models\candidate_party;
use App\Models\position;
use Illuminate\Http\Request;

class candidateController extends Controller
{
    function addCandidate(Request $request)
    {

        $request->validate([
            'position_name' => 'required',
            'candidate_party_name' => 'required',
            'candidate_full_name' => 'required'


        ]);


        if (position::where('position_name', $request->position_name)->first()) {
            # code...
        } else {
            # code...
            position::create([
                'position_name' => $request->position_name,
            ]);

        }

        if (candidate_party::where('candidate_party_name', $request->candidate_party_name)->first()) {
            # code...
        } else {
            # code...
            candidate_party::create([
                'candidate_party_name' => $request->candidate_party_name,
            ]);
        }

        $positionId = position::where('position_name', $request->position_name)->first();
        $candidatePartyId = candidate_party::where('candidate_party_name', $request->candidate_party_name)->first();



        candidate::create([
            'position_id' => $positionId->id,
            'candidate_party_id' => $candidatePartyId->id,
            'department_id' => session('department_id'),
            'candidate_full_name' => $request->candidate_full_name,

        ]);


        return view('adminDashboard');
    }
}
