<?php

namespace App\Http\Controllers;

use App\Models\feedback;
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
        return view('dashboard');
    }
}
