<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Report;
use App\Models\Review;
use App\Models\Event;
use App\Models\Role;
use App\Models\Profile;
use App\Models\Daily_rp;
use App\Models\Project;
use Illuminate\Http\Response;
use Auth;




class ReviewController extends Controller
{
    public function show()
    {
        $active = 1;
        $role = Role::find(Auth::user()->role_id);
        $id = Auth::user()->id;
        $profile_p = Profile::where('id',$id)->first();
        if($role->role != 'Admin' ){
            $active = 0;
        }
        $daily_rp = Report::Join('daily_rps' ,'daily_rps.report_id','reports.id')
                    ->join('profiles' ,'reports.profile_id','profiles.id')
                   ->select(DB::raw("GROUP_CONCAT(daily_rps.daily_task, ' ','(',daily_rps.status,')' SEPARATOR '- ' ) as 'dailyTask'"),'daily_rps.report_id as report_id','reports.*','profiles.*')
                   ->groupBy('daily_rps.report_id')->get();
    	$eventmax = Event::orderBy('id', 'DESC')->first();
        return view('pages.review',compact('daily_rp','eventmax','active','profile_p','role'));
    }
    public function reply(Request $request)
    {
        $id = $request->id;
        $reply = $request->reply;
        $report = Report::find($id);
        $report->reply = $reply;
        $report->save();
        return response()->json($reply, Response::HTTP_OK);
        // return view('pages.review');
    }
}