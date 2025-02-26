<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\Models\CountriesModel;
use App\Models\DepartmentsModel;
use App\Models\LocationsModel;
use App\Models\ManagerModel;
use App\Models\PositionModel;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\JobsModel;
use App\Models\JobHistoryModel;
use App\Models\RegionsModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;        



class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {

        if(Auth::user()->is_role == '1') {

        $data['getEmployeeCount'] = User::count();
        $data['getHRCount'] = User::where('is_role', '=', 1)->count();
        $data['getEMPCount'] = User::where('is_role', '=', 0)->count();

        $data['getTotalJobCount'] = 1;
        $data['getJobHCount'] = 1;
        $data['getRegionsCount'] = 1;

        $data['TodayRegion'] = 1;

        $data['YesterdayRegion'] = 1;

        $data['getCountriesCount'] = 1;
        $data['getLocationsCount'] = 1;
        $data['getDepartmentsCount'] = 1;
        $data['getManagerCount'] = 1;
        $data['getPositionCount'] = 1;

        return view('backend.dashboard.list', $data);

        } else if(Auth::user()->is_role == '0') {
            return view('backend.employee.dashboard.list');
        }


    }
}

?>