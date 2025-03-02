<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\User;

class DepartmentController extends Controller
{
    public function index(Request $request)
    {
       $data['getRecord'] = Department::getRecord($request);
       return view('backend.department.list', $data);
    }

    public function add(Request $request)
    {
        return view('backend.department.add');
    }

    public function add_post(Request $request)
    {
        // dd($request->all());
        
        $user = request()->validate([
           'name' => 'required',
           'location' => 'required',
        ]);

        
        $user = new Department;
        $user->name = trim($request->name);
        $user->location = trim($request->location);
        $user->save();

        return redirect('admin/departments')->with('success', 'Phòng ban Successfully add');
    }

    public function edit($id){
        $data['getRecord'] = Department::find($id);
        return view('backend.department.edit', $data);
    }

    public function edit_update($id, Request $request){
        $user = Department::find($id);
        $user->name = trim($request->name);
        $user->location = trim($request->location);
        $user->save();

        return redirect('admin/departments')->with('success', 'Phòng ban Successfully Update');
    }

    public function delete($id){
        $user = Department::find($id);
        $user->delete();
        return redirect()->back()->with('error', 'Record Successfully deleted');
    }

    public function view($id){
        $data['getRecord'] = Department::with('user')->find($id);
        $data['getCount'] = User::where('department_id','=', $id)->count();
        return view('backend.department.view', $data);
    }

    public function add_employee($id){
        $data['getEmployee'] = User::where('department_id', '=', null)->get();
        $data['getRecord'] = Department::find($id);
        return view('backend.department.add_employee', $data);
    }

    public function add_employee_post($id, Request $request){
        $users = $request->employee_ids;

        // \dd($users);

        foreach($users as $user){
            $user = User::find($user);
            $user->department_id = $id;
            $user->save();
        }
        
        return redirect('admin/departments/add_employee/'.$id)->with('success', 'Employee Successfully add');
    }

    public function delete_employee($id){
        $user = User::find($id);
        $user->department_id = null;
        $user->save();
        return redirect()->back()->with('error', 'Employee Successfully deleted');
    }


}