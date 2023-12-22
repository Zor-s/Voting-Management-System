<?php

namespace App\Http\Controllers;

use App\Models\ballot;
use App\Models\voter;
use Illuminate\Http\Request;

class ballotController extends Controller
{

    function castVote(Request $request)
    {
        // Check if the user has already voted
        if (!session('has_voted')) {

            // Retrieve positions from the session
            $positions = session('positions');

            // Get the user ID based on the voter's username
            $userId = voter::where('voter_username', session('voter_username'))->first()->id;

            // Check if a candidate is selected for all positions
            $isValid = true;
            foreach ($positions as $position) {
                if (!$request->input($position->id)) {
                    $isValid = false;
                    break;
                }
            }

            // If not all positions have candidates selected, show an error message
            if (!$isValid) {
                return back()->withErrors(['message' => 'Please select a candidate for all positions.']);
            } else {
                // Save the votes for each position in the database
                foreach ($positions as $position) {
                    ballot::create([
                        'candidate_id' => $request->input($position->id),
                        'voter_id' => $userId
                    ]);
                }
            }

            // Mark the voter as having voted and update the session
            $voter = voter::find(session('voter_id'));
            $voter->has_voted = true;
            $voter->save();
            session(['has_voted' => $voter->has_voted]);

            // Redirect to the dashboard after successful voting
            return view('dashboard');
        } else {
            // If the user has already voted, redirect to the dashboard
            return view('dashboard');
        }
    }
}
