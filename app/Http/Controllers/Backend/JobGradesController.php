<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobGradesModel;

class JobGradesController extends Controller
{
    public function index(Request $request)
    {
       $data['getRecord'] = JobGradesModel::getRecord($request);
       return view('backend.job_grades.list', $data);
    }

    public function add(Request $request)
    {
        return view('backend.job_grades.add');
    }

    public function add_post(Request $request)
    {
        // dd($request->all());
        
        $user = request()->validate([
           'grade_name' => 'required',
           'salary_multiplier' => 'required',
           
        ]);

        
        $user = new JobGradesModel;
        $user->grade_name = trim($request->grade_name);
        $user->salary_multiplier = trim($request->salary_multiplier);
        $user->save();

        return redirect('admin/job_grades')->with('success', 'Job Grades Successfully add');
    }

    public function edit($id){
        $data['getRecord'] = JobGradesModel::find($id);
        return view('backend.job_grades.edit', $data);
    }

    public function edit_update($id, Request $request){
        $user = JobGradesModel::find($id);
        $user->grade_name = trim($request->grade_name);
        $user->salary_multiplier = trim($request->salary_multiplier);
        $user->save();

        return redirect('admin/job_grades')->with('success', 'Job Grades Successfully Update');
    }

    public function delete($id){
        $user = JobGradesModel::find($id);
        $user->delete();
        return redirect()->back()->with('error', 'Record Successfully deleted');
    }
}