<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;
use App\Models\Profile;
use App\Models\Department;
use App\Models\Project;
use App\Models\Event;
use Auth;



class EventController extends Controller
{
    public function show()
    {
    	$event = Event::get();
        $eventmax = Event::orderBy('id', 'DESC')->first();
        $id = Auth::user()->id;
        $profile_p = Profile::where('id',$id)->first();
        return view('pages.event',compact('event','eventmax','profile_p'));
    }
    public function add(Request $request)
    {
        $event = Event::create([
            'content' => $request->content,
        ]);
        return redirect()->route('event.show');
    }
    public function show_bar()
    {
        $id = MAX(id);
        return view('pages.event',compact('event'));
    }

}