<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\EmployeesNewCreateMail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Mail;


class EmployeesController extends Controller
{
    public function index(Request $request)
    {
        $data['getRecord'] = User::getRecord();
        return view('backend.employees.list', $data);
    }


    public function add(Request $request)
    {
        return view('backend.employees.add');
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
        $user->password = Hash::make('12345678');

        if (!empty($request->file('avatar'))) {
            $file = $request->file('avatar');
            $randomStr = Str::random(30);
            $filename = $randomStr . '.' . $file->getClientOriginalExtension();
            $file->move('upload/', $filename);
            $user->avatar = $filename;
        }

        $user->save();

        User::saveUID($request->full_name, $user->id);

        // Mail::to($user->email)->send(new EmployeesNewCreateMail($user));
        return redirect('admin/employees')->with('success', 'Employees thêm thành công');
    }
    public function view($id)
    {
        $data['getRecord'] = User::find($id);
        return view('backend.employees.view', $data);
    }

    public function edit($id){
        $data['getRecord'] = User::find($id);
        return view('backend.employees.edit', $data);
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
            $user->avatar = $filename;
        }

        $user->save();


        return redirect('admin/employees')->with('success', 'Employees cập nhật thành công.');

    }
    public function delete($id)
    {   

        $recordDelete = User::find($id);
        if(empty($recordDelete)){
            return redirect()->back()->with('error', 'Employees không tồn tại');
        }

        if (!empty($recordDelete->avatar) && file_exists('upload/' . $recordDelete->avatar)) {
            unlink('upload/' . $recordDelete->avatar);
        }

        $recordDelete->delete();
        return redirect()->back()->with('error', 'Employees xóa thành công');

    }
}

?>