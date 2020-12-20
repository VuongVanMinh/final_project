<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $table = 'positions';

    protected $fillable = [
    	'id',
        'position_id',
        'position_name',
        'created_at',
        'updated_at'
    ];
}
