<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as AuthAuthenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\Tutor as Authenticatable;
use App\Tutor;
use App\Level;

class TutorDetails extends Model
{
    use Notifiable, AuthAuthenticatable;
    protected $guard = 'tutors';
    public $table = 'tutor_details';
    protected $fillable = [
        'id',
        'tid',
        'sid',
        'lid',
        'classid',
        'tutor_image',
        'description',
        'hrprice',
        'latitude',
        'longitude'
    ];
    public function levels()
    {
       return $this->belongsTo(Level::class,'id');
    }
    public function tutor()
    {
       return $this->belongsTo(Tutor::class,'id');
    }
}
