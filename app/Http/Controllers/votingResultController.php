<?php

namespace App\Http\Controllers;

use App\Models\ballot;
use App\Models\voting_result;
use Illuminate\Http\Request;

class votingResultController extends Controller
{
    public static function voteCounter($candidate_id)
    {
        // Count the votes for the given candidate_id
        $count = ballot::where('candidate_id', $candidate_id)->count();


        voting_result::create([
            'candidate_id' => $candidate_id,
            'number_of_votes' => $count
        ]);





        // Get all candidate_ids that appear more than once
        $duplicateCandidateIds = voting_result::select('candidate_id')
            ->groupBy('candidate_id')
            ->havingRaw('COUNT(candidate_id) > 1')
            ->pluck('candidate_id');

        foreach ($duplicateCandidateIds as $candidateId) {
            // Get all voting results for this candidate_id
            $votingResults = voting_result::where('candidate_id', $candidateId)
                ->orderBy('number_of_votes', 'asc')
                ->get();

            // Remove all but the one with the highest number_of_votes
            foreach ($votingResults as $index => $votingResult) {
                if ($index < count($votingResults) - 1) {
                    $votingResult->delete();
                }
            }
        }



        // Return the count
        return $count;
    }
}
