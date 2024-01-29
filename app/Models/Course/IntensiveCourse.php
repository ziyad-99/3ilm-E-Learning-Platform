<?php

namespace App\Models\Course;

use App\Models\CourseSession\IntensiveCourseSession;
use App\Models\Enrollment;
use App\Models\Group;
use App\Models\Instructor;
use App\Models\Session;
use App\Models\User;
use App\Models\WaitingList;
use Database\Factories\IntensiveCourseFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class IntensiveCourse extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['title', 'description', 'level'];

    protected $fillable = [
        'title',
        'description',
        'instructor_id',
        'status',
        'price',
        'level',
        'startDate',
        'slug',
        'percentage',
        'paymentType',
        'perSession',
    ];

    public function instructor()
    {
        return $this->belongsTo(Instructor::class);
    }

//########################## Get the enrollments of Intensive Courses ###########################

    public function enrollments()
    {
        return $this->morphMany(Enrollment::class, 'courseable');
    }

//########################## Get the waitingList of Intensive Courses ###########################

    public function waitingList()
    {
        return $this->morphMany(WaitingList::class, 'courseable');
    }

//########################## Get the groups of Intensive Courses ###########################

    public function groups()
    {
        return $this->morphMany(Group::class, 'courseable');
    }


//########################## Get the sessions of Intensive Courses ###########################

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
        return new IntensiveCourseFactory();
    }
}
