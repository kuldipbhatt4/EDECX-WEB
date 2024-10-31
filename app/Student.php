<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as AuthAuthenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
// use Illuminate\Foundation\Auth\Student as Authenticatable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class Student extends Authenticatable
{
    use Notifiable, AuthAuthenticatable, HasApiTokens;

    protected $guard = 'students';
    public $table = 'students';
    protected $fillable = [
        'fname',
        'middle_name',
        'lname',
        'student_dob',
        'gender',
        'address',
        'street_address',
        'street_address_line2',
        'city',
        'state',
        'zipcode',
        'mobile_no',
        'phone_no',
        'work_no',
        'email',
        'password',
        'subject',
        'level'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
	public function getAuthPassword()
    {
     return $this->password;
    }
    public function studentdetails()
    {
        return $this->hasOne(StudentDetails::class,'sid');
    }
    public function rating()
    {
        return $this->hasMany('App\Review');
    }
}
