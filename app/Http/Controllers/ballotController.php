<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ballotController extends Controller
{
    /**
     *  @POST("/vote")
     */
    public function castVote(Request $request){


        return view('dashboard');
    }
}
