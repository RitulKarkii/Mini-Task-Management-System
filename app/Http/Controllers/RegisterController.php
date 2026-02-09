<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User; 

class RegisterController extends Controller
{
    public function register(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email'=> 'required|email|unique:users',
            'password'=> 'required|min:4',
            'role'=>'required|string',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email'=> $request->email,
            'password'=> Hash::make($request->password),
            'role'=>$request->role,
        ]);
        
       return back()->with('success','User Add Successfully!');
   }
}
