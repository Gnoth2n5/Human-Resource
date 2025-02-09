<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
<<<<<<< Updated upstream
=======
use App\Models\User;
>>>>>>> Stashed changes

class EmployeesController extends Controller
{
    public function index(Request $request)
    {
<<<<<<< Updated upstream
        return view('backend.employees.list');
=======
        $data['getRecord']= User::getRecord();
        return view('backend.employees.list',$data);
    }
    public function add(Request $request){
        return view('backend.employees.add');
    }
    public function add_post(Request $request){
        $user = request()->validate([
            'name'=>'required',
            'email'=>'required|unique:users',
            'hire_date'=>'required',
            'job_id'=>'required',
            'salary'=>'required',
            'commission_pct'=>'required',
            'manager_id'=>'required',
            'department_id'=>'required',
        ]);
        $user=new User;
        $user->name=trim($request->name);
        $user->last_name=trim($request->last_name);
        $user->email=trim($request->email);
        $user->phone_number=trim($request->phone_number);
        $user->hire_date=trim($request->hire_date);
        $user->job_id=trim($request->job_id);
        $user->salary=trim($request->salary);
        $user->commission_pct=trim($request->commission_pct);
        $user->manager_id=trim($request->manager_id);
        $user->department_id=trim($request->department_id);
        $user->is_role=0;
        $user->save();
        return redirect('admin/employees')->with('success','Employees thêm thành công');
<<<<<<< Updated upstream




>>>>>>> Stashed changes
=======
    }
    public function view($id){
        $data['getRecord']=User::find($id);
        return view('backend.employees.view',$data);
    }
    public function edit($id){
        $data['getRecord']=User::find($id);
        return view('backend.employees.edit',$data);
    }
    public function edit_update ($id, Request $request){
        $request->validate([
            'email' => 'required|unique:users,email,'.$id
        ]);
        
        $user = User::find($id);
        $user->name            = trim($request->name);
        $user->last_name       = trim($request->last_name);
        $user->email           = trim($request->email);
        $user->phone_number    = trim($request->phone_number);
        $user->hire_date       = trim($request->hire_date);
        $user->job_id          = trim($request->job_id);
        $user->salary          = trim($request->salary);
        $user->commission_pct  = trim($request->commission_pct);
        $user->manager_id      = trim($request->manager_id);
        $user->department_id   = trim($request->department_id);
        $user->is_role         = 0; // 0 - Employees
        $user->save();
        
        return redirect('admin/employees')->with('success', 'Employees cập nhật thành công.');
        
    }
    public function delete($id){
        $recordDelete= User::find($id);
        $recordDelete->delete();
        return redirect()->back()->with('error','Employees xóa thành công');
>>>>>>> Stashed changes
    }
}

?>