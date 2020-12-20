<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'departments';

    protected $fillable = [
        'id',
        'department_name',
        'department_phone',
        'created_at',
        'updated_at'
    ];
}
