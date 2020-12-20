<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Profile;
use App\Models\User;
use App\Models\Role;
use App\Models\Department;
use App\Models\Event;
use App\Models\Position;
use App\Models\Achievement;
use App\Models\Skill_profile;
use App\Models\Skill;

use Auth;


class ProfileController extends Controller
{
	public function show(Request $request)
 	{
 		$id = Auth::user()->id;
 		$user_id = $request->id;
 		$profile = Profile::where('user_id',$user_id)->first();
 		$skills = Skill_profile::where('profile_id',$profile->id)->get()->toArray();
 		$skill = Skill::all();
 		$arrSkillIDsOfProfile = [];
 		foreach ($skills as $key => $value) {
 			$arrSkillIDsOfProfile[] = $value["skill_id"];
  		}
 		$id = Auth::user()->id;
        $profile_p = Profile::where('id',$id)->first();
 		$email_company = User::find($user_id)->email;
 		$eventmax = Event::orderBy('id', 'DESC')->first();
 		$department = Department::all();
 		$position = Position::all();
 		$active = 1;
 		$role = Role::find(Auth::user()->role_id);
 		if($role->role != 'Admin' ){
 			$active = 0;
 		}
	 	$role = Role::all();
 		return view('pages.profile',compact('profile','eventmax','email_company','department','position','skill','profile_p','role','active', 'skills', 'arrSkillIDsOfProfile'));
 	}
 	public function getedit($id)
 	{
 		$profile = Profile::find($id);
 		$skillsProfile = Skill_profile::where('profile_id', $id)->get();
 		return view('pages.profile',compact('profile', 'skillsProfile'));
 	}
 	public function edit(Request $request)
 	{
 		$user_id = $request->id;
 		$profile = Profile::where('user_id',$user_id)->first();
 		if($profile == null){
 			$profile = new Profile();
 			$profile->user_id = $user_id;
 		}
 		$achievement = Achievement::all();
 		$department = Department::all();
 		$profile->user_id = $user_id;
 		$profile->name = $request->name;
 		$profile->gender = $request->gender;
 		$profile->phone = $request->phone;
 		if( $request->hasFile('avatar')){
 			$file = $request->file('avatar');
	        if($file->getClientOriginalExtension() == "JPG" || "PNG")
	        {
		        $filename = $file->getClientOriginalName();
		      	$profile->image  = $filename;
		        $file->move('img',$filename);//move vao noi luu
	        }
 		}
 		$profile->bank = $request->bank;
 		$profile->personal_email = $request->personal_email;
 		$profile->identity_number = $request->identity_number;
 		$profile->birthday = $request->birthday;
 		$profile->department_id = $request->department_id;
 		$profile->company_email = $request->company_mail;
 		$profile->position_id = $request->position_id;
		$profile->save();

 		$skills = $request->skills;
 		Skill_profile::where('profile_id', $profile->id)->delete();
 		foreach ($skills as $value) {
 			if($value=="")continue;
 			$sk = Skill::where('skill',$value);
 			if($sk->count() == 0){
 				$Profile = Skill::create([
	            	'skill' => $value,
        		]);
			}
 			$sk = Skill::where('skill',$value)->first();
 			$sk_p = Skill_profile::where('profile_id', $profile->id)->get();
 			$check = 0;
 			foreach ($sk_p as $sp) {
 				if($sk->id == $sp->skill_id) {
 					$check = 1;
 					break;
 				}
 			}
 			if($check == 0){
 				$sk_pf = Skill_profile::create([
		            'profile_id' => $profile->id,
		            'skill_id' => $sk->id,
    			]);
 			}
 		}
		
 		session()->flash('success', 'You updated successfully!');
 		for($i=0 ;$i<count($request->achievement)-1; $i++ ){
                $achievement = new Achievement;
                $achievement->profile_id = $profile->id ;
                $achievement->achievement = $request->achievement[$i];
                $achievement->year = $request->year[$i];
                $achievement->save();
            }

 		return redirect()->route('profile.show_list');
 	}
 	public function show_list()
 	{
 		$user_id = 20;
 		$id = Auth::user()->id;
        $profile_p = Profile::where('id',$id)->first();
 		$profile = DB::table('profiles')->paginate(4);
 		$department = Department::all();
 		$position = Position::all();
 		$active = 1;
 		$role = Role::find(Auth::user()->role_id);
 		if($role->role != 'Admin' ){
 			$active = 0;
 		}
 		// $email_cpn = User::all();
	 	$role = Role::all();
 		$eventmax = Event::orderBy('id', 'DESC')->first();
 		return view('pages.employee_list', compact('department','profile','eventmax','role','position','active','profile_p'));
 	}
 	public function editEmployee(Request $request)
 	{
 		session()->flash('success', 'You edited successfully!');
 		$user_id = $request->id;
 		return redirect()->route('profile.show',['id' => $user_id]);
 	}
 	public function deleteEmployee(Request $request)
 	{
 		session()->flash('success', 'You have successfully deleted the user!');
 		Profile::where('user_id',$request->id)->delete();
 		return redirect()->route('profile.show_list');
 	}
}














