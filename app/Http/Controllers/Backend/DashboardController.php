<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Department;
use App\Models\Jobs;
use Illuminate\Support\Facades\Auth;        



class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {

        if(Auth::user()->is_role == '1') {

        $data['getEmployeeCount'] = User::where('is_role', '!=', '1')->count();

        $data['getDepartmentCount'] = Department::count();

        $data['JobNoWork'] = Jobs::where('status', 'open')->count();

        $data['JobWork'] = Jobs::where('status', 'in_progress')->count();
        

        return view('backend.dashboard.list', $data);

        } else if(Auth::user()->is_role == '0') {
            return view('backend.employee.dashboard.list');
        }


    }
}

?>