<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'courseable_id',
        'courseable_type',
        'group_id',
        'meetingID',
        'attendeePW',
        'moderatorPW',
        'startDate',
        'bbbLink',
        'logoutURL',
        'endCallbackUrl',
        'recordedLink',
        'status',
    ];

//########################################## get the course of any session  ##################################################################

    public function courseable()
    {
        return $this->morphTo();
    }

//################################### get all the resource of the session ##################################################################

    public function ressources()
    {
        return $this->hasMany(Ressource::class, 'session_id');
    }

//################################### get all the quizzes of the session ##################################################################

    public function quizs()
    {
        return $this->hasMany(Quiz::class, 'session_id');
    }

//################################### get all the discussion of the session ##################################################################

    public function discussion()
    {
        return $this->hasMany(Discussion::class, 'session_id');
    }

//##################################### get the group of the session ##################################################################

    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id');
    }
}
