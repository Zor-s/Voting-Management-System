<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\candidate;
use App\Models\candidate_party;
use App\Models\department;
use App\Models\election;
use App\Models\position;
use App\Models\voter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class adminController extends Controller
{
    public function loginAdmin(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'admin_username' => 'required',
            'admin_password' => 'required',
        ]);

        // Retrieve input values from the request
        $department_id = $request->input('department_name');
        $admin_username = $request->input('admin_username');
        $admin_password = $request->input('admin_password');

        $admin = admin::where('admin_username', $admin_username)
            ->where('department_id', $department_id)
            ->first();

        $departmentName = department::find($department_id);

        // Store relevant data in the session for later use
        session(['admin_username' => $admin_username, 'department_name' => $departmentName->department_name, 'department_id' => $department_id]);

        $electionDepartmentName = election::where('department_id', session('department_id'))->first();







        // Check admin credentials and hash matching
        if ($admin && Hash::check($admin_password, $admin->admin_password)) {
            // Set session data for election department ID
            if ($electionDepartmentName) {
                session(['election_department_id' => $electionDepartmentName->department_id]);
            } else {
                session(['election_department_id' => 0]);
            }

            $positions = position::all();
            $candidates = candidate::all();
            $candidate_parties = candidate_party::all();

            $election = election::where('department_id', session('department_id'))->first();

            // Set session data for election start and end dates
            if ($election) {
                session(['election_start' => $election->election_start, 'election_end' => $election->election_end]);
            } else {
                session(['election_start' => 0, 'election_end' => 0]);
            }

            // Set session data for positions, candidates, and candidate parties
            session(['positions' => $positions, 'candidates' => $candidates, 'candidate_parties' => $candidate_parties]);

            // Redirect to the admin dashboard view
            return view('adminDashboard');
        } else {
            // Redirect back to the admin login page if credentials are invalid
            return redirect('/admin');
        }
    }

    // Handles the password reset functionality for voters
    public function forgotPassword(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'voter_email' => 'required',
            'voter_password' => 'required',
        ]);

        $forgotPassword = voter::where('voter_email', '=', $request->voter_email)->first();

        // Update the voter's password with the hashed new password
        $forgotPassword->voter_password = Hash::make($request->voter_password);
        $forgotPassword->save();

        // Display a success message and redirect to the login view
        echo '<script>alert("Password changed successfully!")</script>';
        return view('login');
    }
}
