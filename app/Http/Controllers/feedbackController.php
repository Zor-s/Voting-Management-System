<?php

namespace App\Http\Controllers;

use App\Models\feedback;
use App\Models\voter;
use Illuminate\Http\Request;

class feedbackController extends Controller
{
    function submitFeedback(Request $request){

        $request->validate([
            'rating' => 'required',
        ]);





        feedback::create([
            'voter_id' => session('voter_id'),
            'feedback_rating' => $request->rating,
            'feedback_comment' => $request->feedback

        ]);

        $voter = voter::find(session('voter_id'));
        $voter->has_feedback = true;
        $voter->save();

        session(['has_feedback' => $voter->has_feedback]);
        return view('dashboard');
    }
}
