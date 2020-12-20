<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $table = 'skills';

    protected $fillable = [
        'profile_id',
        'skill',
        'created_at',
        'updated_at',
    ];
}
