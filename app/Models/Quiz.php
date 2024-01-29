<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = [
        'session_id',
        'quizName',
        'totalQuestions',
        'quizType',
        'date',
        'duration',
        'markPerQuestion',
        'status',
    ];

//################################### get the session of the quiz #######################################################

    public function session()
    {
        return $this->belongsTo(Session::class, 'session_id');
    }

//################################### get the questions of the quiz #######################################################

    public function questions()
    {
        return $this->hasMany(Question::class, 'quiz_id');
    }

    public function marks()
    {
        return $this->hasMany(Mark::class, 'quiz_id');
    }
}
