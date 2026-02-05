<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 

class LoginController extends Controller
{
    public function login(Request $request){
        // /validate input
        $credentials = $request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);

        // check email and password
        if(Auth::attempt($credentials)){
            // dd(Auth::user());
            // login success
            return redirect('/dashboard');
        }

        // login faild
        return back()->with('error','Invalid email or password');
    }
}
