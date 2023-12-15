<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\department;
use App\Models\voter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class adminController extends Controller
{
   public function loginAdmin(Request $request){
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



        if ($admin && Hash::check($admin_password, $admin->admin_password)) {
            session(['admin_username'=> $admin_username,  'department_name' => $departmentName->department_name, 'department_id' => $department_id]);
            return view('adminDashboard');

        } else {

            return redirect('/admin');
        }


    }
}
