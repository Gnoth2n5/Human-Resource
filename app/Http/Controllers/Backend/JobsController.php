<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Jobs;
use App\Exports\JobsExport;
use App\Models\JobAssignment;
use Illuminate\Support\Facades\Auth;

class JobsController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::user()->is_role == 1) {
            $data['getRecord'] = Jobs::getRecord($request);
            return view('backend.jobs.list', $data);
        } else {

            $data['getRecord'] = JobAssignment::with('job')
                ->where('user_id', Auth::user()->id)
                ->orderByRaw("CASE WHEN status = 'in_progress' THEN 1 ELSE 2 END")
                // ->orderBy('created_at', 'desc') // Có thể thêm sắp xếp thứ hai nếu cần
                ->paginate(10);


            return view('backend.employee.job.list', $data);
        }
    }

    public function jobs_export(Request $request)
    {
        $exporter = new JobsExport();
        return $exporter->export();
    }


    public function add()
    {
        $users = User::get_user();

        return view('backend.jobs.add', compact('users'));
    }

    public function add_post(Request $request)
    {
        // dd($request->all());

        $job = request()->validate([
            'title' => 'required',
            'start_at' => 'required',
            'end_at' => 'required',
        ]);

        $job = new Jobs;

        $job->title = trim($request->title);
        $job->description = trim($request->description);
        $job->start_at = trim($request->start_at);
        $job->end_at = trim($request->end_at);

        $job->save();

        if ($request->assign) {
            JobAssignment::assignOrUpdateJob($request->assign, $job->id);
        }


        return redirect('admin/jobs')->with('success', 'Việc Làm Thêm Thành Công');
    }

    public function view($id, Request $request)
    {
        $data['getRecord'] = Jobs::with('assignedUsers.department')->find($id);

        // \dd($data['getRecord']);

        return view('backend.jobs.view', $data);
    }

    public function edit($id)
    {
        $data['job'] = Jobs::find($id);
        $data['assign'] = JobAssignment::where('job_id', $id)->pluck('user_id') ?? [];

        // \dd($data['assign']);

        $data['users'] = User::get_user();
        return view('backend.jobs.edit', $data);
    }

    public function edit_update(Request $request, $id)
    {

        $job = request()->validate([
            'title' => 'required',
            'start_at' => 'required',
            'end_at' => 'required',
        ]);

        $job = Jobs::find($id);

        $job->title = trim($request->title);
        $job->description = trim($request->description);
        $job->start_at = trim($request->start_at);
        $job->end_at = trim($request->end_at);

        $job->save();

        if ($request->assign) {
            JobAssignment::assignOrUpdateJob($request->assign, $job->id);
        } else {
            JobAssignment::assignOrUpdateJob(0, $job->id);
        }


        return redirect('admin/jobs')->with('success', 'Việc Làm Sửa Thành Công');
    }

    public function delete($id)
    {
        $recordDelete = Jobs::find($id);
        $recordDelete->delete();
        return redirect()->back()->with('error', 'Việc Làm Xóa Thành Công');
    }

    public function view_job($id)
    {
        $data['getRecord'] = Jobs::find($id);

        return view('backend.employee.job.view', $data);
    }

    public function complete_job(Request $request, $id)
    {
        $jobAss = JobAssignment::find($id);
        $jobAss->markAsCompleted($request->note);

        // $job

        return redirect('employee/my_jobs')->with('success', 'Công Việc Đã Hoàn Thành');
    }
}
