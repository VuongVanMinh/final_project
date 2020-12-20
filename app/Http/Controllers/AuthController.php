<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Profile;
use App\Models\Event;
use Auth;


class AuthController extends Controller
{
    public function login(Request $request)
    {
        // dd(2);
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $id = Auth::user()->id;
            $profile_p = Profile::where('id',$id)->first();
            $eventmax = Event::orderBy('id', 'DESC')->first();
            return view('pages.welcome',compact('user','profile_p','eventmax'));
        }else{
            $error = 1;
            return view('layouts.login',compact('error'));
        }
    }
    public function logout()
    {
        // dd(44);
        Auth::logout();
        return redirect()->route('login');
        
    }
    public function showChangePasswordForm(){
        $id = Auth::user()->id;
        $profile_p = Profile::where('id',$id)->first();
        return view('pages.changepassword',compact('profile_p'));
    }
    public function changePassword(Request $request){

        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("success","Password changed successfully !");

    }
}
