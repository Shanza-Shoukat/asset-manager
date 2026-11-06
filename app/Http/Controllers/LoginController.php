<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Redirect;

class LoginController extends Controller
{
    public function show(){
        return view('auth.login');
    }
    public function login(Request $request){
        $loginData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',

        ]);
        $loginData['admin'] = true;
        $loginData['active'] = true;
        if (! Auth::attempt($loginData)) {
            return back()->withErrors(['email'=>'emaill or password is incorrect'])->onlyInput('email');
        }
        $request->session()->regenerate();
        return redirect()->intended('/');

    }
     public function logout(Request $request){
    Auth::logout();
     $request->session()->invalidate();
     $request->session()->regenerateToken();

     return redirect()->route('login');
     }
}
