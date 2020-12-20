<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;
use App\Models\Profile;
use App\Models\Department;
use App\Models\Project;
use App\Models\Event;
use App\Models\Role;
use Auth;
use Input;


class ProjectController extends Controller
{
    public function show()
    {
        $active = 1;
        $role = Role::find(Auth::user()->role_id);
        if($role->role != 'Admin' && 'Directorate' ){
            $active = 0;
        }
        if($role->role == 'Leader' ){
            $active = 2;
        }
        $project_pa = DB::table('projects')->paginate(4);
        $id = Auth::user()->id;
        $profile_p = Profile::where('id',$id)->first();
        $profile = Profile::all();
        $project = Project::get();
        $eventmax = Event::orderBy('id', 'DESC')->first();
        return view('pages.project',compact('project','eventmax','active','profile','profile_p','project_pa'));
    }
    public function autocomplete(Request $request){
        $term = $request->term;
        $data = Profile::where('name','LIKE','%'.$term.'%')
        ->take(10)
        ->get();
        $results = array();
        foreach ($data as $key => $v) {
            $results[] = ['id'=>$v->id,'value'=>$v->name];
        }
        return response()->json($results);
    }

	public function add(Request $request)
    {
        $member = implode(", ", $request->member);
        $project = Project::create([
            'title' => $request->title,
            'team_name' => $request->team_name,
            'team_leader' => $request->team_leader,
            'member' =>  $member,
            'start_date' => $request->startDate,
            'end_date' => $request->endDate
        ]);
        // $profile = Profile::all();
        // $active = 1;
        // $role = Role::find(Auth::user()->role_id);
        // if($role->role != 'Admin' && 'Directorate' ){
        //     $active = 0;
        // }
        // if($role->role == 'Leader' ){
        //     $active = 2;
        // }
        // // return view('pages.project',compact('profile','project','active'));
        return redirect()->route('project.show');
        // return redirect()->route('project.show',['id' => $id]);
    }
    public function editProject(Request $request)
    {

        $id = $request->id;
        $profile = Profile::all();
        $project = Project::find($id);
        $project->title =  $request->title;
        $project->team_name =  $request->team_name;
        $project->team_leader =  $request->team_leader;
        $project->member =  $request->member;
        $project->start_date =  $request->start_date;
        $project->end_date =  $request->end_date;
        $project->save();
        return redirect()->route('project.show',['id' => $id],compact('project'));
    }
    public function deleteProject(Request $request)
    {
        $project = Project::get();
        Project::where('id',$request->id)->delete();
        return redirect()->route('project.show');
    }
}