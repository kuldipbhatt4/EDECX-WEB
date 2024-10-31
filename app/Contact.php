<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contact_us';
    protected $fillable = [
        'fname',
        'phone_no',
        'contact_email',
        'age',
        'address',
        'hobbies',
        'message'
    ];
}
