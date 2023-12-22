<?php

namespace App\Http\Controllers;

use App\Models\feedback;
use App\Models\voter;
use Illuminate\Http\Request;

class feedbackController extends Controller
{
    function submitFeedback(Request $request)
    {
        // Check if feedback has been submitted already
        if (!session('has_feedback')) {
    
            // Validate the rating field in the request
            $request->validate([
                'rating' => 'required',
            ]);
    
            // Create a new feedback entry in the database
            feedback::create([
                'voter_id' => session('voter_id'),
                'feedback_rating' => $request->rating,
                'feedback_comment' => $request->feedback
            ]);
    
            // Update the 'has_feedback' status for the current voter
            $voter = voter::find(session('voter_id'));
            $voter->has_feedback = true;
            $voter->save();
    
            // Update the 'has_feedback' session variable
            session(['has_feedback' => $voter->has_feedback]);
    
            // Redirect to the dashboard view
            return view('dashboard');
        } else {
            // If feedback has already been submitted, redirect to the dashboard
            return view('dashboard');
        }
    }
    
}
