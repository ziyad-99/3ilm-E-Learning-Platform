<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use App\Models\Course\SupportingCourse;
use App\Models\Instructor;
use App\Models\SubscriptionCCP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class SupportingCourseController extends Controller
{
    public function index()
    {
        $sup_courses = SupportingCourse::where('status', 1)->paginate(9);

        $branches = SupportingCourse::where('status', 1)
            ->pluck('branch')
            ->filter() // This will remove null values from the collection
            ->unique();

        $high_School_years = SupportingCourse::where('status', 1)->where('level->en', 'High School')->pluck('year')->unique();
        $secondary_School_years = SupportingCourse::where('status', 1)->where('level->en', 'Secondary School')->pluck('year')->unique();
        $primary_School_years = SupportingCourse::where('status', 1)->where('level->en', 'Primary School')->pluck('year')->unique();

        return view('website.courses.supportingCourse.all_course', compact('sup_courses', 'branches', 'high_School_years', 'secondary_School_years', 'primary_School_years'));
    }

    public function corseDetails($slug)
    {
        $course = SupportingCourse::where('slug', $slug)->first();
        $sup_courses = SupportingCourse::where('status', 1)->inRandomOrder()->take(3)->get();

        if ($course == null)
            return redirect()->back();

        return view('website.courses.supportingCourse.course_details', compact('course', 'sup_courses'));
    }

    public function create()
    {
        return view('website.courses.supportingCourse.testForm');
    }

    public function store(Request $request)
    {
//        $request->validate([
//            'title' => ['required'],
//            'description' => ['required'],
//            'price' => ['required'],
//            'level' => ['required'],
//            'branch' => ['required'],
//        ]);

        $course = new SupportingCourse();

        $course->title = ['en' => $request->title, 'ar' => 'الدرس باللغة العربية', 'fr' => 'ééééé'];
        $course->description = ['en' => 'Description in English', 'ar' => 'الوصف باللغة العربية', 'fr' => 'éééééééééé'];
        $course->instructor_id = Auth::guard('instructor')->id();
        $course->status = 'active';
        $course->frameTime = '2015/05/12';
        $course->startDate = '2015/05/12';
        $course->price = $request->price;
        $course->level = ['en' => 'livel in English', 'ar' => 'المستوى باللغة العربية', 'fr' => 'éééééééééé'];
        $course->branch = ['en' => 'two', 'ar' => 'واحد', 'fr' => 'éééééééééé'];
        $course->slug = Str::slug($request->title);

        $course->save();

        return redirect()->route('testForm');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
