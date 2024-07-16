<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(){
        if(Auth::check()){
            return redirect(route('home'));
        }
        return view('login');
    }

    public function register(){
        if(Auth::check()){
            return redirect(route('home'));
        }
        return view('register');
    }

    public function loginPost(Request $request) {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
            return redirect()->intended(route('home'));
        }
        return redirect(route('login'))->with('error','Email or Password invalid');
    }

    public function registerPost(Request $request) {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required'
        ]);
        try {
            User::create([
                'name' => (string) $request->input('name'),
                'email' => (string) $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'role' => 'user'
            ]);
        } catch (\Exception $err) {
            return redirect()->intended(route('register'))->with('error','Register failed');
        }
        return redirect(route('login'))->with('success','Login to access your account');
    }

    public function logout() {
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }
}
