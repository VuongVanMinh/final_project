<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Profile;
use App\Models\Department;
use App\Models\Event;
use App\Models\Skill;
use App\Models\Skill_profiles;
use App\Models\Position;
use Auth;




class Appropriate_candidateController extends Controller
{
    public function show()
    {
        $skill = Skill::all();
        $id = Auth::user()->id;
        $profile_p = Profile::where('id',$id)->first();
        $profile = Profile::all();                            
        $department = Department::all();
        $position = Position::all();
        $eventmax = Event::orderBy('id', 'DESC')->first();
        return view('pages.appropriate_candidate', compact('department','profile','position','eventmax','skill','profile_p'));
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $where = [];
            if ($request->department) {
                $where = [
                    ['department_id', '=', $request->department]
                ];
            }
            if ($request->position) {
                $where[] = ['position_id', '=', $request->position];
            }

            $skills = [];
            if ( !empty($request->skills) ) {
                 $skills = $request->skills;
            }
            $list = \DB::table('profiles')
            ->select('profiles.id', 'profiles.name', 'profiles.company_email', 'departments.department_name', 'positions.position_name')
            ->join('departments', 'departments.id', '=', 'profiles.department_id')
            ->join('positions', 'positions.id', '=', 'profiles.position_id')
            ->leftJoin('skill_profiles', 'skill_profiles.profile_id', '=', 'profiles.id')
            ->where($where);

            $list = $list->groupBy('profiles.id')
            ->get();

            if ($list) {
                foreach ($list as $key => $item) {
                    $skillsOfProfileId = \App\Models\Skill_profile::getItemsOfProfileId($item->id);
                    $skillsString = '';
                    foreach( $skillsOfProfileId as $key2 => $value  ){
                       if( $key + 1 == count($skillsOfProfileId) ){
                            $skillsString = $skillsString .  $value->skill;
                        }
                        else{
                            $skillsString = $skillsString .  $value->skill . ',';
                        }  
                    }

                    $arrSkillIDsOfProfile = [];
                    foreach ($skillsOfProfileId as $key3 => $value3) {
                        $arrSkillIDsOfProfile[] = $value3->skill_id;
                    }

                    $containsSearch = count(array_intersect($skills, $arrSkillIDsOfProfile)) == count($skills);

                    // dd($containsSearch);
                    if( !$containsSearch ){
                        // unset($item);
                        continue;
                    }

                    // get projectIds of profileID.
                    $projectsOfProfileId = \App\Models\Project::getProjectIdsOfProfileId($item->id);
                    //dd($projectsOfProfileId;
                    $status = 'Free';
                    
                    if( count($projectsOfProfileId) > 0 ){
                        $status = '';

                        foreach( $projectsOfProfileId as $project ){
                            $startDate = $project["start_date"];
                            $endDate = $project["end_date"];
                            $status = $status . $startDate . " ~ " . $endDate . ' ; ';
                        }
                    }
                       
                    $output .= '<tr class="else">
                        <td style="display: none;">'. $item->id .'</td>
                        <td class="name_c column">' . $item->name .'</td>
                        <td class="email_c column">' . $item->company_email . '</td>
                        <td class="skill_c column">' .  $skillsString . '</td>
                        <td class="dep_c column">'. $item->department_name .'</td>
                        <td class="pos_c column">'. $item->position_name .'</td>
                        <td class="stt_s column">' . $status . '</td>
                    </tr>';
                }
            }
            
            return Response($output);
        }
    }
}