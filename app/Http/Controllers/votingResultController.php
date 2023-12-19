<?php

namespace App\Http\Controllers;

use App\Models\ballot;
use Illuminate\Http\Request;

class votingResultController extends Controller
{
    public static function voteCounter($candidate_id)
    {
        // Count the votes for the given candidate_id
        $count = ballot::where('candidate_id', $candidate_id)->count();

        // Return the count
        return $count;
    }
}
