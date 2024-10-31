<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Location extends Model
{
    protected $table = 'locations';
    protected $fillable = [
        'location','area_code'
    ];
}
