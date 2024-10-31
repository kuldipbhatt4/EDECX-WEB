<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    protected $table = 'fcontactus';
    protected $fillable = [
        'contactno',
        'emailid',
        'address',
        'maplink',
        'fabout'
    ];
}
