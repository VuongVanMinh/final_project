<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Profile;

class Project extends Model
{
    protected $table = 'projects';

    protected $fillable = [
        'title',
        'team_name',
        'team_leader',
        'member',
        'start_date',
        'end_date',
        'created_at',
        'updated_at'
    ];

    public static function getProjectIdsOfProfileId($profileId){
        $allProjects = Project::all()->toArray();
        $result = [];
        foreach ($allProjects as $key => $project) {
            $membersString = $project['member'];
            $leaderId = $project['team_leader'];

            $membersArrayExpode = explode(',', $membersString);
            $membersArray = [];
            foreach ($membersArrayExpode as $key2 => $value2) {
                $membersArray[] = trim($value2);
            }

            if( $profileId ==  $leaderId || in_array($profileId,  $membersArray) ){
                $result[] = $project;
            }
        }
        return $result;
    }
    public function profile_lead(){ 
        $p = Profile::find($this->team_leader);
        return isset($p->name) ? $p->name : '';
    }
    public function profile_mem(){
        $mem = explode(", ", $this->member);  
        $profile = Profile::WhereIn("id",$mem)->get();
        $rs = "";
        $i = 0;
        foreach ($profile as $p) {
            if($i==0){
                $rs .= $p->name;
            }else{
                $rs .= ", ".$p->name;
            }
            $i++;
        }
        return $rs;
    }
}
