<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'enrollment_id',
        'courseable_id',
        'courseable_type',
        'name',
    ];

//############################### get the course of any Group  #################################################

    public function courseable()
    {
        return $this->morphTo();
    }

//################################## Group En rollments ############################################

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class, 'student_id');
    }

//################################## Group Members ############################################

    public function members()
    {
        return $this->hasMany(GroupMember::class, 'group_id');
    }

//################################## Group Sessions ############################################

    public function sessions()
    {
        return $this->hasMany(Session::class, 'group_id');
    }

//################################## Study days ############################################

    public function studyDays()
    {
        return $this->hasMany(StudyDay::class, 'group_id');
    }
}
