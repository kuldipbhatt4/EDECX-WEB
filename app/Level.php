<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\TutorDetails;

class Level extends Model
{
    protected $table = 'levels';
    protected $primaryKey="id";
    protected $fillable = [
        'id',
        'level'
    ];

    public function users()
    {
        return $this->hasOne(TutorDetails::class,'lid');
    }
}
