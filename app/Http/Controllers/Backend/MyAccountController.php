<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class MyAccountController extends Controller
{
    public function my_account(Request $request)
    {
        $data['getRecord'] = User::find(Auth::user()->id);
        return view('backend.my_account.update', $data);
    }

    public function edit_update(Request $request){
        //dd($request->all());
        $use = request()->validate([
            'full_name' => 'required',
            'email' => 'required|unique:users,email,'.Auth::user()->id
        ]);

        $user = User::find(Auth::user()->id);
        $user->full_name = trim($request->full_name);
        $user->email = trim($request->email);

        if(!empty($request->password)){
            $user->password = trim($request->password);
        }

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

        return redirect('admin/my_account')->with('success', 'My Account successfully update!!!');

    }


    public function employee_my_account(Request $request){
        $data['getRecord'] = User::find(Auth::user()->id);
        return view('backend.employee.my_account.update', $data);
    }

    public function employee_my_account_update(Request $request){
        $use = request()->validate([
            'email' => 'required|unique:users,email,'.Auth::user()->id
        ]);

        $user = User::find(Auth::user()->id);
        $user->name = trim($request->name);
        $user->email = trim($request->email);

        if(!empty($request->password)){
            $user->password = trim($request->password);
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

        return redirect('employee/my_account')->with('success', 'Tài khoản cập nhật thành công!!!');
    }

}

?>