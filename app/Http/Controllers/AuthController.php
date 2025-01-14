<?php
namespace App\Http\Controllers;
use Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Str;
class AuthController extends Controller{
    public function index(Request $request){
        return view('login');
    }
    public function forgot_password(Request $request){
       return view('forgot_password');
    }
    public function register(Request $request){
        return view('register');
    }
    public function register_post(Request $request){
        // dd($request->all());
        $user=request()->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6',
            'confirm_password'=>'required_with:password|same:password|min:6',
        ]);
        $user=new User();
        
        $user->name=trim($request->name);
        $user->email=trim($request->email);
        $user->password=Hash::make($request->password);
        $user->remember_token =Str::random(50);
        $user->save();

        return redirect('/')->with('success','Register Success');
    }
    public function checkEmail(Request $request)
    {
        $email = $request->input('email');
        $isExists = User::where('email', $email)->exists();
    
        if ($isExists) {
            return response()->json(['exists' => true]);
        } else {
            return response()->json(['exists' => false]);
        }
    }
    
}
?>