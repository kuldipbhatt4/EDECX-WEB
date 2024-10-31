<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as AuthAuthenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use App\TutorDetails;

class Tutor extends Authenticatable
{
    use Notifiable, AuthAuthenticatable, HasApiTokens;
    protected $guard = 'tutors';
    public $table = 'tutors';
    protected $fillable = [
        'tutors_fname',
        'tutors_lname',
        'tutor_email',
        'password',
        'contact_no',
        'address',
        'resume',
        'status'
    ];

	protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function tutordetails()
    {
        return $this->hasOne(TutorDetails::class,'tid');
    }
    public function tutorlevel()
    {
        return $this->hasOne('App\Level');
    }
	public function getAuthPassword()
    {
        return $this->password;
    }
    public function rating()
    {
        return $this->hasMany(Rating::class);
    }
}
