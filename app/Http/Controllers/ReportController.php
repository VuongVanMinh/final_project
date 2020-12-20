<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Department;
use App\Models\Report;
use App\Models\Review;
use App\Models\Event;
use App\Models\Daily_rp;
use Auth;


class ReportController extends Controller
{
    public function show()
    {
        $department = Department::all();
    	$report = Report::get();
        $project = Project::all();
        $eventmax = Event::orderBy('id', 'DESC')->first();
        $id = Auth::user()->id;
        $profile_p = Profile::where('id',$id)->first();
        return view('pages.report',compact('report','eventmax','profile_p','project','department'));
    }
    public function add(Request $request)
    {

        $id = \Auth::user()->id;
        $id_profile = Profile::where('user_id',$id)->value('id','name');
        $department = Department::all();
        $report = Report::create([
            'title' => $request->title,
            'qac' => $request->qac,
            'profile_id' =>$id_profile,
            'team_leader' => $request->team_leader,
        ]);
        $file = $request->file_uploaded;
        $filename = $file->getClientOriginalName();
        var_dump($filename);
        $report->file = $filename;
        $report->save();
        $file->move('document', $filename);
          for($i=0 ;$i<count($request->daily_task)-1; $i++ ){
                $daily_rp = new Daily_rp;
                $daily_rp->report_id = $report->id ;
                $daily_rp->daily_task = $request->daily_task[$i];
                $daily_rp->status = $request->status[$i];
                $daily_rp->save();
            }
        $project = Project::all();
        session()->flash('success', 'The report has been sent!');
        return redirect()->route('report.show',compact('project','department'));
    }
}