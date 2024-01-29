<?php

namespace App\Http\Controllers;

use App\Models\Course\IntensiveCourse;
use App\Models\Course\LanguageCourse;
use App\Models\Course\SupportingCourse;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class FilterController extends Controller
{
    public function leveFilter(Request $request)
    {
        if ($request->courses == 'sup_courses') {

            if ($request->level) {
                $sup_courses = SupportingCourse::where('status', 1)->where('level->en', $request->level)->paginate(9);
                $branches = SupportingCourse::where('status', 1)->pluck('branch')->unique();

                $high_School_years = SupportingCourse::where('status', 1)->where('level->en', 'High School')->pluck('year')->unique();
                $secondary_School_years = SupportingCourse::where('status', 1)->where('level->en', 'Secondary School')->pluck('year')->unique();
                $primary_School_years = SupportingCourse::where('status', 1)->where('level->en', 'Primary School')->pluck('year')->unique();

                return view('website.courses.supportingCourse.all_course', compact('sup_courses', 'branches', 'high_School_years', 'secondary_School_years', 'primary_School_years'));
            }
        }

        if ($request->courses == 'lang_courses') {

            $lang_courses = LanguageCourse::where('status', 1)->where('level->en', $request->level)->paginate(9);

            return view('website.courses.languageCourse.all_course', compact('lang_courses'));
        }

        if ($request->courses == 'inten_courses') {

            $inten_courses = IntensiveCourse::where('status', 1)->where('level->en', $request->level)->paginate(9);

            return view('website.courses.intensiveCourse.all_course', compact('inten_courses'));
        }
    }

    public function branchFilter(Request $request)
    {
        $local = LaravelLocalization::getCurrentLocale();

        $branches = SupportingCourse::where('status', 1)
            ->pluck('branch')
            ->filter() // This will remove null values from the collection
            ->unique();

        $high_School_years = SupportingCourse::where('status', 1)->where('level->en', 'High School')->pluck('year')->unique();
        $secondary_School_years = SupportingCourse::where('status', 1)->where('level->en', 'Secondary School')->pluck('year')->unique();
        $primary_School_years = SupportingCourse::where('status', 1)->where('level->en', 'Primary School')->pluck('year')->unique();

        if ($request->courses == 'sup_courses') {
            if ($local === 'en')
                $sup_courses = SupportingCourse::where('status', 1)->where('branch->en', $request->branch)->paginate(9);

            if ($local === 'fr')
                $sup_courses = SupportingCourse::where('status', 1)->where('branch->fr', $request->branch)->paginate(9);

            if ($local === 'ar')
                $sup_courses = SupportingCourse::where('status', 1)->where('branch->ar', $request->branch)->paginate(9);

            return view('website.courses.supportingCourse.all_course', compact('sup_courses', 'branches', 'high_School_years', 'secondary_School_years', 'primary_School_years'));
        }
    }

    public function yearFilter(Request $request)
    {
        $sup_courses = SupportingCourse::where('status', 1)->where('year', $request->year)->paginate(9);
        $branches = SupportingCourse::where('status', 1)->pluck('branch')->unique();

        $high_School_years = SupportingCourse::where('status', 1)->where('level->en', 'High School')->pluck('year')->unique();
        $secondary_School_years = SupportingCourse::where('status', 1)->where('level->en', 'Secondary School')->pluck('year')->unique();
        $primary_School_years = SupportingCourse::where('status', 1)->where('level->en', 'Primary School')->pluck('year')->unique();

        return view('website.courses.supportingCourse.all_course', compact('sup_courses', 'branches', 'high_School_years', 'secondary_School_years', 'primary_School_years'));
    }

    public function courseFilter(Request $request)
    {
        //filter just by level
        if ($request->has('supportingCourseLevel') && !$request->has('high_school_year')
            && !$request->has('secondary_school_year') && !$request->has('primary_school_year') && !$request->has('branch')) {
            $sup_courses = SupportingCourse::where('status', 1)->where('level->en', $request->supportingCourseLevel)->get();
        }

        //search by level and year
        if ($request->has('supportingCourseLevel') && ($request->has('high_school_year')
                || $request->has('secondary_school_year') || $request->has('primary_school_year')) && !$request->has('branch')) {

            //get the level
            $level = $request->supportingCourseLevel;

            //get the year inserted in request
            if ($request->has('high_school_year')) {
                $year = $request->high_school_year;
            } elseif ($request->has('secondary_school_year')) {
                $year = $request->secondary_school_year;
            } elseif ($request->has('primary_school_year')) {
                $year = $request->primary_school_year;
            }

            $sup_courses = SupportingCourse::where('status', 1)
                ->where('level->en', $level)
                ->where('year', $year)
                ->get();
        }

        //search by level and year and branch
        if ($request->has('supportingCourseLevel') && ($request->has('high_school_year')
                || $request->has('secondary_school_year') || $request->has('primary_school_year')) && $request->has('branch')) {

            //get the level
            $level = $request->supportingCourseLevel;

            //get the year inserted in request
            if ($request->has('high_school_year')) {
                $year = $request->input('high_school_year');
            } elseif ($request->has('secondary_school_year')) {
                $year = $request->input('secondary_school_year');
            } elseif ($request->has('primary_school_year')) {
                $year = $request->input('primary_school_year');
            }

            //get the branch from request
            $branch = $request->branch;

            $sup_courses = SupportingCourse::where('status', 1)->where('level->en', $level)
                ->where('year', $year)
                ->where('branch->en', $branch)
                ->get();
        }

        return view('website.courses.supportingCourse.ajaxFilterCourse', compact('sup_courses'));
    }
}
