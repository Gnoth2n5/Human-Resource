<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\JobsModel;
use App\Models\JobHistoryModel;
use App\Models\DepartmentsModel;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\JobHistoryExport;

class JobHistoryController extends Controller
{
    public function index(Request $request)
    {
        $data['getRecord'] = JobHistoryModel::getRecord($request);
        return view('backend.job_history.list', $data);
    }

    public function job_history_export(Request $request)
    {
        $export = new JobHistoryExport($request);
        return $export->export();
    }


    public function add()
    {
        $data['getDepartments'] = DepartmentsModel::get();
        $data['getEmployee'] = User::where('is_role', 0)->get();
        $data['getJobs'] = JobsModel::all();
        return view('backend.job_history.add', $data);
    }

    public function add_post(Request $request)
    {
        $validatedData = $request->validate([
            'employee_id' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'job_id' => 'required',
            'department_id' => 'required',
        ]);

        $jobHistory = new JobHistoryModel();
        $jobHistory->employee_id = trim($validatedData['employee_id']);
        $jobHistory->start_date = trim($validatedData['start_date']);
        $jobHistory->end_date = trim($validatedData['end_date']);
        $jobHistory->job_id = trim($validatedData['job_id']);
        $jobHistory->department_id = trim($validatedData['department_id']);
        $jobHistory->save();

        return redirect('admin/job_history')->with('success', 'Job History Successfully added');
    }

    public function edit($id)
    {
        $data['getDepartments'] = DepartmentsModel::get();
        $data['getEmployee'] = User::where('is_role', 0)->get();
        $data['getJobs'] = JobsModel::all();
        $data['getRecord'] = JobHistoryModel::find($id);

        if (!$data['getRecord']) {
            return redirect('admin/job_history')->with('error', 'Record not found');
        }

        return view('backend.job_history.edit', $data);
    }

    public function edit_update($id, Request $request)
    {
        $user = JobHistoryModel::find($id);
        if (!$user) {
            return redirect('admin/job_history')->with('error', 'Record not found');
        }

        $validatedData = $request->validate([
            'employee_id' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'job_id' => 'required',
            'department_id' => 'required',
        ]);

        $user->employee_id = trim($validatedData['employee_id']);
        $user->start_date = trim($validatedData['start_date']);
        $user->end_date = trim($validatedData['end_date']);
        $user->job_id = trim($validatedData['job_id']);
        $user->department_id = trim($validatedData['department_id']);
        $user->save();

        return redirect('admin/job_history')->with('success', 'Job History Successfully updated');
    }

    public function delete($id)
    {
        $user = JobHistoryModel::find($id);
        if (!$user) {
            return redirect()->back()->with('error', 'Record not found');
        }

        $user->delete();
        return redirect()->back()->with('success', 'Record Successfully deleted');
    }
}
