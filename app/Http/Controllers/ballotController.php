<?php

namespace App\Http\Controllers;

use App\Models\ballot;
use App\Models\voter;
use Illuminate\Http\Request;


class ballotController extends Controller
{

    public function castVote(Request $request)
    {

        $positions = session('positions');

        $userId = voter::where('voter_username', session('voter_username'))->first()->id;

        foreach ($positions as $position) {
            if (!$request->input($position->id)) {
                return back()->withErrors(['message' => 'Please select a candidate for all positions.']);
            }

            ballot::create([
                'candidate_id' => $request->input($position->id),
                'voter_id' => $userId
                
              ]);
        }



        return view('dashboard');
    }
}
