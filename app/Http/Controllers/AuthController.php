<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Mail\ForgotPasswordMail;
class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function forgot_password()
    {
        return view('forgot_password');
    }

    public function forgot_password_post(Request $request)
    {
        //dd($request->all());

        $count = User::where('email', '=', $request->email)->count();
        if ($count > 0) {
            $user = User::where('email', '=', $request->email)->first();

            $random_pass = rand(111111, 999999);

            $user->password = Hash::make($random_pass);
            $user->save();

            $user->random_pass = $random_pass;

            Mail::to($user->email)->send(new ForgotPasswordMail($user));
            return redirect()->back()->with('success', 'Password has been send email');
        } else {
            return redirect()->back()->with('error', 'Email Not Found');
        }
    }

    public function register()
    {
        return view('register');
    }

    public function register_post(Request $request)
    {
        // Validate request data
        $request->validate([
            'name' => 'required|string|max:255|regex:/^[a-zA-Z0-9\s]+$/',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|min:6',
            'confirm_password' => 'required_with:password|same:password|min:6',
        ]);

        // Create a new user
        $user = new User();
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->remember_token = Str::random(50);
        $user->save();

        return redirect('/')->with('success', 'Register Success');
    }

    public function checkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $email = $request->input('email');
        $isExists = User::where('email', $email)->exists();

        return response()->json(['exists' => $isExists]);
    }

    public function login_post(Request $request)
    {
        // Validate request data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Attempt login
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], true)) {
            if (Auth::user()->is_role == '1') {
                return redirect()->intended('admin/dashboard');
<<<<<<< Updated upstream
=======

            } else if (Auth::User()->is_role == '0') {
                return redirect()->intended('employee/dashboard');

>>>>>>> Stashed changes
            } else {
                Auth::logout();
                return redirect('/')->with('error', 'No HR Available.. please check');
            }
        } else {
            return redirect()->back()->with('error', 'Please enter the correct credentials');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect(url('/'));
    }
}
?>