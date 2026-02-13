<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile(){
        $user = Auth::user(); 
        return view('profile',compact('user'));
    }

    public function upload(Request $request){
        $request->validate([
            'profile_image'=>'image|mimes:jpg,jpeg,png,gif|max:2048'
        ]);

        $user = Auth::user();

        if($request->hasfile('profile_image')){
            $image = $request->file('profile_image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/profile'),$imageName);
            $user->profile_image = $imageName;
            $user->save();
        }
        return view('profile');
    }
}
