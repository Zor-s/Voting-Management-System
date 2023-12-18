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
        $request->validate([
            'admin_username' => 'required',
            'admin_password' => 'required',

        ]);

        $department_id = $request->input('department_name');
        $admin_username = $request->input('admin_username');
        $admin_password = $request->input('admin_password');

        $admin = admin::where('admin_username', $admin_username)
            ->where('department_id', $department_id)
            ->first();

        $departmentName = department::find($department_id);

        session(['admin_username' => $admin_username, 'department_name' => $departmentName->department_name, 'department_id' => $department_id]);

        $electionDepartmentName = election::where('department_id', session('department_id'))->first();



        if ($admin && Hash::check($admin_password, $admin->admin_password)) {



            if ($electionDepartmentName) {
                // do something with $electionDepartmentName->department_id
                session(['election_department_id' => $electionDepartmentName->department_id]);
            } else {
                // do something else if no election was found
                session(['election_department_id' => 0]);
            }

            $positions = position::all();
            $candidates = candidate::all();
            $candidate_parties = candidate_party::all();

            $election = election::where('department_id',session('department_id'))->first();

            if ($election) {
                # code...
                session(['election_start' => $election->election_start, 'election_end' => $election->election_end]);
            }else {
                # code...
                session(['election_start' => 0, 'election_end' => 0]);

            }




            session(['positions' => $positions, 'candidates' => $candidates, 'candidate_parties' => $candidate_parties]);
            return view('adminDashboard');

        } else {

            return redirect('/admin');
        }


    }
}
