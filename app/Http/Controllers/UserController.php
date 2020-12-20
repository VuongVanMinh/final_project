<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;
use App\Models\Profile;
use App\Models\Department;
use App\Models\Event;
use App\Models\Role;
use Auth;

class UserController extends Controller
{
    public function index(Request $request){
        if (Auth::user()) {
            $user = Auth::user();
            $id = Auth::user()->id;
            $profile_p = Profile::where('id',$id)->first();
            $eventmax = Event::orderBy('id', 'DESC')->first();
            return view('pages.welcome',compact('user','eventmax','profile_p'));
        }else{
            return view('layouts.login');
        }
    }
	public function show()
    {
    	$department = Department::all(); 
        $role = Role::all();
        return redirect()->route('profile.show_list');

    }
    public function add(Request $request)
    {
 		$department = Department::all();
        $role = Role::all();
 		$user = User::create([
            'email' => $request->company_email,
            'password' =>bcrypt($request->password),
            'role_id' => $request->role_id
        ]);
 		$Profile = Profile::create([
            'user_id' => $user->id,
            'department_id' => $request->department_id,
            'position_id' => $request->position_id,
            'company_email' => $request->company_email,
        ]);
        session()->flash('success', 'User created successfully!');
 		return redirect()->route('profile.show_list');
 	}
}