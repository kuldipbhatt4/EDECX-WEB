<?php

namespace App;

use Illuminate\Auth\Authenticatable as AuthAuthenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;

class EdecxAdmin extends Model implements \Illuminate\Contracts\Auth\Authenticatable
{
    use Notifiable, AuthAuthenticatable;

    protected $guard = 'admins';
    public $table = 'edecx_admins';
    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
                'fname',
                'lname',
                'email',
                'password',
                'profile_image',
                'admin_dob',
                'login_logo',
                'login_sideimage',
                'price',
                'minimum_wallet_amount_deposit',
                'facebook',
                'twitter',
                'youtube',
                'instagram'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
