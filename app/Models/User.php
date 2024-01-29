<?php

namespace App\Models;

use App\Models\Course\IntensiveCourse;
use App\Models\Course\LanguageCourse;
use App\Models\Course\SupportingCourse;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use TheHocineSaad\LaravelChargilyEPay\Traits\Epayable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    use Epayable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstName',
        'lastName',
        'email',
        'gender',
        'phone',
        'phone_verified_at',
        'code',
        'expired_at',
        'photo',
        'password',
        'rest_password_code',
        'rest_password_code_expired_at',
        'address',
        'status',
        'state',
        'bio',
        'provider',
        'provider_id',
        'provider_token',
        'remember_token',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


//################################## Get the notifications ############################################

//    public function notifications()
//    {
//        return $this->hasMany(Notification::class, 'student_id');
//    }


//################################## get the Enrolments in Courses #####################################################

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class, 'student_id');
    }

//################################## get the Waiting Lists Courses #####################################################

    public function waitingLists()
    {
        return $this->hasMany(WaitingList::class, 'student_id');
    }

//################################## get the groups of courses #########################################################

    public function groups()
    {
        return $this->hasMany(Group::class, 'student_id');
    }

//################################## get the messages of discussion #########################################################

    public function messages()
    {
        return $this->hasMany(Message::class, 'student_id');
    }

//################################## get the marks #########################################################

    public function marks()
    {
        return $this->hasMany(Mark::class, 'student_id');
    }
}
