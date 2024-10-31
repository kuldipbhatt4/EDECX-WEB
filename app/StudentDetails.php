<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as AuthAuthenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\Tutor as Authenticatable;
use App\Student;

class StudentDetails extends Model
{
    use Notifiable, AuthAuthenticatable;

    protected $guard = 'students';
    public $table = 'student_details';
    protected $fillable = [
        'sid',
        'classid',
        'lid',
        'aboutme',
        'student_image',
        'latitude',
        'longitude'
    ];
    public function student()
    {
       return $this->belongsTo(Student::class,'id');
    }
}
