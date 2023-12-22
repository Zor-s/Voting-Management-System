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
    
        // Validate the incoming request data
        $request->validate([
            'position_name' => 'required',
            'candidate_party_name' => 'required',
            'candidate_full_name' => 'required'
        ]);
    
        // Check if the position already exists; if not, create a new position
        if (position::where('position_name', $request->position_name)->first()) {
        } else {
            // Create a new position
            position::create([
                'position_name' => $request->position_name,
            ]);
        }
    
        // Check if the candidate party already exists; if not, create a new candidate party
        if (candidate_party::where('candidate_party_name', $request->candidate_party_name)->first()) {
        } else {
            // Create a new candidate party
            candidate_party::create([
                'candidate_party_name' => $request->candidate_party_name,
            ]);
        }
    
        // Retrieve the IDs for the created position and candidate party
        $positionId = position::where('position_name', $request->position_name)->first();
        $candidatePartyId = candidate_party::where('candidate_party_name', $request->candidate_party_name)->first();
    
        // Create a new candidate with the obtained IDs and other details
        candidate::create([
            'position_id' => $positionId->id,
            'candidate_party_id' => $candidatePartyId->id,
            'department_id' => session('department_id'),
            'candidate_full_name' => $request->candidate_full_name,
        ]);
    
        // Retrieve and store all positions, candidates, and candidate parties in session
        $positions = position::all();
        $candidates = candidate::all();
        $candidate_parties = candidate_party::all();
        session(['positions' => $positions, 'candidates' => $candidates, 'candidate_parties' => $candidate_parties]);
    
        // Redirect to the admin dashboard view
        return view('adminDashboard');
    }
    

    function deleteCandidate(Request $request){
        
        // Delete the candidate with the given id
        candidate::where('id', $request->candidate_id)->delete();

        // Fetch all positions, candidates, and candidate parties
        $positions = position::all();
        $candidates = candidate::all();
        $candidate_parties = candidate_party::all();

        // Update session data with the latest positions, candidates, and candidate parties
        session(['positions' => $positions, 'candidates' => $candidates, 'candidate_parties' => $candidate_parties]);

        // Return the admin dashboard view
        return view('adminDashboard');
  }

}
