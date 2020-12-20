<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'reports';

    protected $fillable = [
        'profile_id',
        'department_id',
        'title',
        'team_leader',
        'daily_KPI',
        'status',
        'file',
        'qac',
        'reply',
        'created_at',
        'updated_at'
    ];
}
