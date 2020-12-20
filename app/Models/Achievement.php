<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    protected $table = 'achievements';

    protected $fillable = [
        'profile_id',
        'achievement',
        'year',
        'created_at',
        'updated_at'
    ];
}
