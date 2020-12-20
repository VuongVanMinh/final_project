<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Support\Facades\DB;
use DB;

class Skill_profile extends Model
{
    protected $table = 'skill_profiles';

    protected $fillable = [
        'profile_id',
        'skill_id',
        'created_at',
        'updated_at',
    ];

    public static function getItemsOfProfileId($profileId){
    	// return Skill_profile::where('profile_id', $profileId)->get();
    	return DB::table('skill_profiles')->join('skills', 'skill_profiles.skill_id', 'skills.id')->where('profile_id', $profileId)->select('skill_profiles.*', 'skills.skill')->get();
    }
}
