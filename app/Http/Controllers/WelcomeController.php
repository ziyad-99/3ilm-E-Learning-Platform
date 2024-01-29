<?php

namespace App\Http\Controllers;

use App\Models\Course\IntensiveCourse;
use App\Models\Course\LanguageCourse;
use App\Models\Course\SupportingCourse;
use App\Models\Enrollment;
use App\Models\Instructor;
use App\Models\User;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $sup_courses = SupportingCourse::where('status', 1)->get();
        $lang_courses = LanguageCourse::where('status', 1)->get();
        $inten_courses = IntensiveCourse::where('status', 1)->get();

        $enrolls_number = Enrollment::all()->count();
        $instructors_number = Instructor::all()->count();
        $courses_number = $sup_courses->count() + $lang_courses->count() + $inten_courses->count();

        $trend_inten_courses = IntensiveCourse::withCount('enrollments')
            ->orderByDesc('enrollments_count') // Order by enrollments count in descending order
            ->take(4) // Get the first 4 courses
            ->get();

        return view('website.welcome',
            compact('sup_courses', 'lang_courses', 'inten_courses', 'enrolls_number', 'instructors_number', 'courses_number', 'trend_inten_courses'));
    }
}
