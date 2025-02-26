<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\JobsModel;
use App\Mail\EmployeesNewCreateMail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\ManagerModel;
use App\Models\DepartmentsModel;
use App\Models\PositionModel;
use Illuminate\Support\Facades\Mail;


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
            'full_name' => 'required',
            'email' => 'required|unique:users',
            'phone_number' => 'required',
            'address' => 'required',
            
        ]);
        $user = new User;
        $user->full_name = trim($request->full_name);
        $user->email = trim($request->email);
        $user->phone_number = trim($request->phone_number);
        $user->address = trim($request->address);

        if (!empty($request->file('avatar'))) {
            $file = $request->file('avatar');
            $randomStr = Str::random(30);
            $filename = $randomStr . '.' . $file->getClientOriginalExtension();
            $file->move('upload/', $filename);
            $user->profile_image = $filename;
        }

        $user->save();
        Mail::to($user->email)->send(new EmployeesNewCreateMail($user));
        return redirect('admin/employees')->with('success', 'Employees thêm thành công');


    }
    public function view($id)
    {
        $data['getRecord'] = User::find($id);
        return view('backend.employees.view', $data);
    }

    public function edit($id){
        return view('backend.employees.edit');
    }
    public function edit_update($id, Request $request)
    {
        $request->validate([
            'email' => 'required|unique:users,email,' . $id,
            'full_name' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
        ]);

        $user = User::find($id);
        $user->full_name = trim($request->full_name);
        $user->email = trim($request->email);
        $user->phone_number = trim($request->phone_number);
        $user->address = trim($request->address);
       

        

        if (!empty($request->file('avatar'))) {

            if (!empty($user->avatar) && file_exists('upload/' . $user->avatar)) {
                unlink('upload/' . $user->avatar);
            }

            $file = $request->file('avatar');
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