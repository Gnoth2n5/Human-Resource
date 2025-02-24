<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\JobsModel;

use Str;
use File;
use Hash;

use App\Models\ManagerModel;
use App\Models\DepartmentsModel;
use App\Models\PositionModel;

class EmployeesController extends Controller
{
    public function index(Request $request)
    {
        $data['getRecord'] = User::getRecord();
        return view('backend.employees.list', $data);
    }

    public function image_delete($id, Request $request){
        $deleteRecord = User::find($id);
        $deleteRecord->profile_image = $request->profile_image;
        $deleteRecord->save();
        return redirect()->back()->with('error', 'Ảnh Đại Diện đã xóa thành công');
    }

    public function add(Request $request){
        $data['getPosition'] = PositionModel::get();
        $data['getDepartments'] = DepartmentsModel::get();
        $data['getManager'] = ManagerModel::get();

        $data['getJobs'] = JobsModel::get();
        return view('backend.employees.add', $data);
    }
    public function add_post(Request $request)
    {
        $user = request()->validate([
            'name' => 'required',
            'password' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users',
            'hire_date' => 'required',
            'job_id' => 'required',
            'salary' => 'required|numeric|min:0.01',
            'commission_pct' => 'required|numeric|min:0',
            'manager_id' => 'required',
            'department_id' => 'required',
            'phone_number' => 'required'
        ]);
        $user = new User;
        $user->name = trim($request->name);
        $user->last_name = trim($request->last_name);
        $user->email = trim($request->email);
        $user->phone_number = trim($request->phone_number);
        $user->hire_date = trim($request->hire_date);
        $user->job_id = trim($request->job_id);
        $user->salary = trim($request->salary);
        $user->commission_pct = trim($request->commission_pct);
        $user->manager_id = trim($request->manager_id);
        $user->department_id = trim($request->department_id);
        $user->position_id = trim($request->position_id);
        $user->is_role = 0;
        $user->password = Hash::make($request->password);

        if (!empty($request->file('profile_image'))) {
            $file = $request->file('profile_image');
            $randomStr = Str::random(30);
            $filename = $randomStr . '.' . $file->getClientOriginalExtension();
            $file->move('upload/', $filename);
            $user->profile_image = $filename;
        }

        $user->save();
        return redirect('admin/employees')->with('success', 'Employees thêm thành công');


    }
    public function view($id)
    {
        $data['getRecord'] = User::find($id);
        return view('backend.employees.view', $data);
    }

    public function edit($id){
        $data['getPosition'] = PositionModel::get();
        $data['getDepartments'] = DepartmentsModel::get();
        $data['getManager'] = ManagerModel::get();

        $data['getRecord']=User::find($id);

        $data['getJobs'] = JobsModel::get();
        return view('backend.employees.edit', $data);
    }
    public function edit_update($id, Request $request)
    {
        $request->validate([
            'email' => 'required|unique:users,email,' . $id,
            'name' => 'required',
            'last_name' => 'required',
            'hire_date' => 'required',
            'job_id' => 'required',
            'salary' => 'required|numeric|min:0.01',
            'commission_pct' => 'required|numeric|min:0',
            'manager_id' => 'required',
            'department_id' => 'required',
            'phone_number' => 'required'
        ]);

        $user = User::find($id);
        $user->name = trim($request->name);
        $user->last_name = trim($request->last_name);
        $user->email = trim($request->email);
        $user->phone_number = trim($request->phone_number);
        $user->hire_date = trim($request->hire_date);
        $user->job_id = trim($request->job_id);
        $user->salary = trim($request->salary);
        $user->commission_pct = trim($request->commission_pct);
        $user->manager_id = trim($request->manager_id);
        $user->department_id = trim($request->department_id);
        $user->position_id = trim($request->position_id);
        $user->is_role = 0; // 0 - Employees

        if(!empty($request->password)){
            $user->password = Hash::make($request->password);
        }

        if (!empty($request->file('profile_image'))) {

            if (!empty($user->profile_image) && file_exists('upload/' . $user->profile_image)) {
                unlink('upload/' . $user->profile_image);
            }

            $file = $request->file('profile_image');
            $randomStr = Str::random(30);
            $filename = $randomStr . '.' . $file->getClientOriginalExtension();
            $file->move('upload/', $filename);
            $user->profile_image = $filename;
        }

        $user->save();

        return redirect('admin/employees')->with('success', 'Employees cập nhật thành công.');

    }
    public function delete($id)
    {
        $recordDelete = User::find($id);
        $recordDelete->delete();
        return redirect()->back()->with('error', 'Employees xóa thành công');

    }
}

?>