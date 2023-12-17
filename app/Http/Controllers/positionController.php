<?php

namespace App\Http\Controllers;

use App\Models\candidate;
use App\Models\candidate_party;
use App\Models\position;
use Illuminate\Http\Request;

class positionController extends Controller
{
    function deletePosition(Request $request){
        position::where('id', $request->position_id)->delete();



        $positions = position::all();
        $candidates = candidate::all();
        $candidate_parties = candidate_party::all();

        session(['positions' => $positions, 'candidates' => $candidates, 'candidate_parties' => $candidate_parties]);

        
        return view('adminDashboard');
    }
}
