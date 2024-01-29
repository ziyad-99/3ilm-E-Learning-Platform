<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'courseable_id',
        'courseable_type',
        'group_id',
        'status',
        'date',
        'startDate',
        'endDate',
    ];

//############################### get the course of any enrollment  #################################################

    public function courseable()
    {
        return $this->morphTo();
    }


//################################## Waiting Lists Courses ############################################

    public function user()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

//################################## Waiting Lists Courses ############################################

    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id');
    }
}
