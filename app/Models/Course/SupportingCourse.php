<?php

namespace App\Models\Course;

use App\Models\Enrollment;
use App\Models\Group;
use App\Models\Instructor;
use App\Models\Session;
use App\Models\User;
use App\Models\waitingList;
use Database\Factories\SupportingCourseFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Spatie\Translatable\HasTranslations;

class SupportingCourse extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['title', 'description', 'level', 'branch'];

    protected $fillable = [
        'title',
        'description',
        'instructor_id',
        'status',
        'price',
        'level',
        'branch',
        'frameTime',
        'startDate',
        'slug',
        'percentage',
        'paymentType',
        'perSession',
    ];


    public function instructor()
    {
        return $this->belongsTo(Instructor::class, 'instructor_id');
    }

//########################## Get the enrollments of Supporting Courses ###########################

    public function enrollments()
    {
        return $this->morphMany(Enrollment::class, 'courseable');
    }

//########################## Get the waitingList of Supporting Courses ###########################

    public function waitingList()
    {
        return $this->morphMany(WaitingList::class, 'courseable');
    }


//########################## Get the groups of Supporting Courses ###########################

    public function groups()
    {
        return $this->morphMany(Group::class, 'courseable');
    }


//########################## Get the sessions of Supporting Courses ###########################

    public function sessions()
    {
        return $this->morphMany(Session::class, 'courseable');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected static function newFactory()
    {
        return new SupportingCourseFactory();
    }
}
