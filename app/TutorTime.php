<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TutorTime extends Model
{
    protected $table = 'tutor_time';
    protected $fillable = [
        'id',
        'tutor_id',
        'days_id',
        'time_id'
    ];
}
