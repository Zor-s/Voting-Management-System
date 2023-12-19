<?php

namespace App\Http\Controllers;

use App\Models\ballot;
use App\Models\voter;
use Illuminate\Http\Request;


class ballotController extends Controller
{

    function castVote(Request $request)
    {
        if (!session('has_voted')) {
            # code...


            $positions = session('positions');

            $userId = voter::where('voter_username', session('voter_username'))->first()->id;

            $isValid = true;
            foreach ($positions as $position) {
                if (!$request->input($position->id)) {
                    $isValid = false;
                    break;
                }
            }

            if (!$isValid) {
                return back()->withErrors(['message' => 'Please select a candidate for all positions.']);
            } else {
                foreach ($positions as $position) {
                    ballot::create([
                        'candidate_id' => $request->input($position->id),
                        'voter_id' => $userId
                    ]);
                }
            }

            $voter = voter::find(session('voter_id'));
            $voter->has_voted = true;
            $voter->save();
            session(['has_voted' => $voter->has_voted]);


            return view('dashboard');
        }else {
            # code...
            return view('dashboard');

        }
    }
}
