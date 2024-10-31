<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $table = 'faq';
    protected $fillable = [
        'faq_question',
        'faq_answer',
        'student_tutor'
    ];
}
