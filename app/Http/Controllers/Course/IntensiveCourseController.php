<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use App\Models\Course\IntensiveCourse;
use App\Models\Instructor;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class IntensiveCourseController extends Controller
{
    public function index()
    {
        $inten_courses = IntensiveCourse::where('status', 1)->paginate(9);

        return view('website.courses.intensiveCourse.all_course', compact('inten_courses'));
    }

    public function create()
    {
        return view('website.courses.intensiveCourse.testForm');
    }

    public function corseDetails($slug)
    {
        $course = IntensiveCourse::where('slug', $slug)->first();
        $inten_courses = IntensiveCourse::where('status', 1)->inRandomOrder()->take(3)->get();


        if ($course == null)
            return redirect()->back();

        return view('website.courses.intensiveCourse.course_details', compact('course', 'inten_courses'));
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

        $course = new IntensiveCourse();

        $course->title = ['en' => $request->title, 'ar' => 'الدرس باللغة العربية', 'fr' => 'ééééé'];
        $course->description = ['en' => 'Description in English', 'ar' => 'الوصف باللغة العربية', 'fr' => 'éééééééééé'];
        $course->instructor_id = 1;
        $course->status = 'active';
        $course->startDate = '2015/05/12';
        $course->price = $request->price;
        $course->level = ['en' => 'livel in English', 'ar' => 'المستوى باللغة العربية', 'fr' => 'éééééééééé'];
        $course->slug = Str::slug($request->title);

        $course->save();

        return redirect()->route('testFormIntensive');
    }

    public function show(IntensiveCourse $intensiveCourse)
    {
        //
    }

    public function edit(IntensiveCourse $intensiveCourse)
    {
        //
    }

    public function update(Request $request, IntensiveCourse $intensiveCourse)
    {
        //
    }

    public function destroy(IntensiveCourse $intensiveCourse)
    {
        //
    }
}
