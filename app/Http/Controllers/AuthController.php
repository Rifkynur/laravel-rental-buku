<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(Request $request){
        return view('login');
    }
    public function register(){
        return view('register');
    }
    public function authenticating(Request $request){
        $credential = $request->validate([
            'user_name' => ['required'],
            'password' => ['required'],
        ]);

        // cek apakah login valid
        if(Auth::attempt($credential)){
            // cek apakah status user active
            if(Auth::user()->status != 'active'){

                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                Session::flash('status', 'failed');
                Session::flash('message', 'your account is not active yet, please contact admin');

            return redirect('/login'); 
            }

            $request->session()->regenerate();

            if(Auth::user()->role_id == 1){
                return redirect('dashboard');
            }elseif(Auth::user()->role_id == 2){
                return redirect('profile');
            }

        return redirect('home');
        }

        Session::flash('status', 'failed');
        Session::flash('message', 'password or username is wrong');
        return redirect('/login');
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function registerProcess(Request $request){
        $validate = $request->validate([
            'user_name' => 'required | unique:users',
            'password' => 'required',
            'phone' => 'required',
            'address' => 'required'
        ]);
        $password = $request->password;
        $password =  Hash::make($request->newPassword);
        $data = User::create($request->all());

        Session::flash('status', 'success');
        Session::flash('message', 'Register Success, wait for approval');
        return redirect('/register');
    }
}
