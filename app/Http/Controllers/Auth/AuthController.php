<?php

namespace App\Http\Controllers\Auth;

use App\Models\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{ 
    public function __construct()
    {
        $this->middleware('guest')->except(['logout']);
        $this->validation = config('app.formvalid') ?? false;
    }

    public function index()
    {
        return redirect('login');
    }

    public function login(Request $request) 
    {
        // Check Session
        if (Session::has('loginId')){
            return redirect()->route('dashboard');
        } else {
            return view('admin.production.login');
        }
    }

    public function loginUser(Request $request) 
    {
        // Check Session
        if (Session::has('loginId')){
            return redirect()->route('dashboard');
        }

        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:8'
        ]);

        $user = Admin::Where('email', '=',$request->email)->first();
            if ($user) {
                if (Hash::check($request->password, $user->password)){
                    Session::put('loginId', $user->id);
                    return redirect('dashboard')->with('login-success','You are loged in!');
                } else {
                    return redirect('login')->with('login-password-fail','Password not matched!');
                }
            } else {
                return redirect('login')->with('login-fail','Email not matched!');
            }
    }

    public function showRegister() 
    {
        if (Session::has('loginId')){
            return redirect()->route('dashboard');
        } else {
            return view('admin.production.register');
        }
        
    }
    
    public function register(Request $request) 
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'phone' => 'required',
            'password'=>'required|min:8|required_with:conf_password|same:conf_password',
            'conf_password'=>'required|min:8',
            'email'=>'required|unique:admin,email'
        ],[
            'firstname.required' => 'First Name is required!',
            'lastname.required' => 'Last Name is required!',
            'email.required' => 'Email Address is required!',
            'email.unique' => 'Entered Email Address is already exist!',
            'password.required' => 'Password is required!',
            'password.min' => 'Password must be 8 character long!',
            'password.required_with' => 'Password and confirm password must same!',
            'password.same' => 'The password and confirm password must same!',
            'conf_password.required' => 'Confirm Password is required!',
        ]);

         $adminData = [
            'firstname' => $request->get('firstname'),
            'lastname' => $request->get('lastname'), 
            'email' => $request->get('email'),
            'phone' =>  $request->get('phone'),
            'password' => Hash::make($request->get('password')),
            'conf_password' => Hash::make($request->get('conf_password')),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
         ];
        // dd($adminData); 
        return view('admin.production.confirm_register', ['adminData' => $adminData]);
    }
    
    public function registerConfirm(Request $request)
    { 
        $adminData = [
            'firstname' => $request->get('firstname'),
            'lastname' => $request->get('lastname'),
            'email' => $request->get('email'),
            'phone' =>  $request->get('phone'),
            'password' => $request->get('password'),
            'conf_password' => $request->get('conf_password'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];
        
        Admin::create($adminData);
        return redirect('login')->with('success','You have successfully registered,please login!');
    }

    public function dashboard()
    {
        $loginSessionId = Session::get('loginId');
        $data = array();
        if (Session::has('loginId')) {
            $data = Admin::Where('id', '=', $loginSessionId)->first();
        } else {
            return redirect('login');
        }
        return view('admin.production.index', ['adminData' => $data]);
    }

    public function logout(Request $request) 
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('/');
    }
}
