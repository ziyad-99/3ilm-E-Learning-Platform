<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use App\Models\Course\LanguageCourse;
use App\Models\Instructor;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;


class LanguageCourseController extends Controller
{

    public function index()
    {
        $lang_courses = LanguageCourse::where('status', 1)->paginate(9);

        return view('website.courses.languageCourse.all_course', compact('lang_courses'));
    }

    public function create()
    {
        return view('website.courses.languageCourse.testForm');
    }

    public function corseDetails($slug)
    {
        $course = LanguageCourse::where('slug', $slug)->first();
        $lang_courses = LanguageCourse::where('status', 1)->inRandomOrder()->take(3)->get();

        if ($course == null)
            return redirect()->back();

        return view('website.courses.languageCourse.course_details', compact('course', 'lang_courses'));
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

        $course = new LanguageCourse();

        $course->title = ['en' => $request->title, 'ar' => 'الدرس باللغة العربية', 'fr' => 'ééééé'];
        $course->description = ['en' => 'Description in English', 'ar' => 'الوصف باللغة العربية', 'fr' => 'éééééééééé'];
        $course->instructor_id = 1;
        $course->status = 'active';
        $course->startDate = '2015/05/12';
        $course->price = $request->price;
        $course->level = ['en' => 'livel in English', 'ar' => 'المستوى باللغة العربية', 'fr' => 'éééééééééé'];
        $course->slug = Str::slug($request->title);

        $course->save();

        return redirect()->route('testFormLanguages');
    }

    public function testLinkLanguageCourse(Request $request)
    {
        $course = LanguageCourse::where('slug', $request->slug)->first();

        return redirect()->away($course->testLink);
    }

    public function show(LanguageCourse $languageCourse)
    {
        //
    }


    public function edit(LanguageCourse $languageCourse)
    {
        //
    }


    public function update(Request $request, LanguageCourse $languageCourse)
    {
        //
    }


    public function destroy(LanguageCourse $languageCourse)
    {
        //
    }
}
