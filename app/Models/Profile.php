<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use App\Models\Department;
use App\Models\Position;
class Profile extends Model
{
    protected $table = 'profiles';

    protected $fillable = [
        'user_id',
        'name',
        'gender',
        'phone',
        'image',
        'bank',
        'personal_email',
        'company_email',
        'identity_number',
        'birthday',
        'department_id',
        'position_id',
        'achievement',
        'created_at',
        'updated_at'
    ];
    public function position_p(){
        return Position::find($this->position_id);
    }
    public function department(){
        return Department::where('id',$this->department_id)->first();
    }
    
}
