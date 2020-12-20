<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Daily_rp extends Model
{
    protected $table = 'daily_rps';

    protected $fillable = [
        'id',
        'report_id',
        'daily_task',
        'status',
        'created_at',
        'updated_at'
    ];
}
