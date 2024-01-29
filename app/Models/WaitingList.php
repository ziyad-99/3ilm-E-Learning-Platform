<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaitingList extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'courseable_id',
        'courseable_type',
        'date',
        'group_selected',
        'monthsNumber',
    ];

    //############################### get the course of any waiting list  #################################################

    public function courseable()
    {
        return $this->morphTo();
    }

    //############################### get the student #################################################

    public function student()
    {
        return $this->belongsTo(User::class);
    }

    //############################### group selected #################################################

    public function group()
    {
        return $this->belongsTo(Group::class, 'group_selected');
    }
}
