<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class AuthController extends Controller{
    public function index(Request $reques){
        return view('login');
    }
    public function forgot_password(Request $reques){
       return view('forgot_password');
    }
    public function register(Request $reques){
        return view('register');
    }
}
?>