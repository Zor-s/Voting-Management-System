<?php

namespace App\Http\Controllers;

use App\Models\candidate;
use App\Models\candidate_party;
use App\Models\position;
use Illuminate\Http\Request;

class positionController extends Controller
{
    function deletePosition(Request $request)
    {
        // Delete the position with the given id
        position::where('id', $request->position_id)->delete();

        // Retrieve all positions, candidates, and candidate parties after deletion
        $positions = position::all();
        $candidates = candidate::all();
        $candidate_parties = candidate_party::all();

        // Store the updated data in the session
        session(['positions' => $positions, 'candidates' => $candidates, 'candidate_parties' => $candidate_parties]);

        // Redirect to the adminDashboard view
        return view('adminDashboard');
    }

}
