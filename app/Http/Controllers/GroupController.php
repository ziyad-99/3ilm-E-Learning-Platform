<?php

namespace App\Http\Controllers;

use App\Models\Course\IntensiveCourse;
use App\Models\Course\LanguageCourse;
use App\Models\Course\SupportingCourse;
use App\Models\Discussion;
use App\Models\Enrollment;
use App\Models\Group;
use App\Models\Instructor;
use App\Models\Notification;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\Ressource;
use App\Models\Session;
use App\Models\StudyDay;
use App\Models\SubscriptionCCP;
use App\Models\User;
use App\Models\waitingList;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function allGroups()
    {
        $groups = Group::all();

        $instructors = Instructor::all();

        return view('website.admin.groupe.allGroups', compact('groups', 'instructors'));
    }

    public function addGroup()
    {
        $sup_courses = SupportingCourse::all();
        $lang_courses = LanguageCourse::all();
        $inten_courses = IntensiveCourse::all();

        return view('website.admin.groupe.createGroup', compact('sup_courses', 'lang_courses', 'inten_courses'));
    }

    public function storeGroup(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255', // Validation rules for name field
            'courseable_type' => 'required|string|in:App\Models\Course\SupportingCourse,App\Models\Course\LanguageCourse,App\Models\Course\IntensiveCourse', // Validation rules for courseable_type
            'supportingCourse_id' => 'nullable|exists:supporting_courses,id', // Validation rules for supportingCourse_id
            'languagesCourse_id' => 'nullable|exists:language_courses,id', // Validation rules for languagesCourse_id
            'intensiveCourse_id' => 'nullable|exists:intensive_courses,id', // Validation rules for intensiveCourse_id
        ]);

        //get the course id
        switch ($request->courseable_type) {
            case 'App\Models\Course\SupportingCourse':
                $course_id = $request->supportingCourse_id;
                break;
            case 'App\Models\Course\LanguageCourse':
                $course_id = $request->languagesCourse_id;
                break;
            case 'App\Models\Course\IntensiveCourse':
                $course_id = $request->intensiveCourse_id;
                break;
        }

        //create the group
        $group = Group::create([
            'courseable_id' => $course_id,
            'courseable_type' => $request->courseable_type,
            'name' => $request->name,
        ]);

        //handel the day
        if ($request->has('saturday')) {
            //day translation
            $day_en = 'saturday';
            $day_fr = 'Samedi';
            $day_ar = 'السبت';

            //get the start and end time
            $startTime = $request->saturdayStartTime;
            $endTime = $request->saturdayEndTime;

            //create Study Day
            $this->createStudyDay($group->id, $day_en, $day_ar, $day_fr, $startTime, $endTime);
        }

        //handel the day
        if ($request->has('sunday')) {
            //day translation
            $day_en = 'sunday';
            $day_fr = 'Dimanche';
            $day_ar = 'الأحد';

            //get the start and end time
            $startTime = $request->sundayStartTime;
            $endTime = $request->sundayEndTime;

            //create Study Day
            $this->createStudyDay($group->id, $day_en, $day_ar, $day_fr, $startTime, $endTime);
        }

        //handel the day
        if ($request->has('monday')) {
            //day translation
            $day_en = 'monday';
            $day_fr = 'Lundi';
            $day_ar = 'الإثنين';

            //get the start and end time
            $startTime = $request->mondayStartTime;
            $endTime = $request->mondayEndTime;

            //create Study Day
            $this->createStudyDay($group->id, $day_en, $day_ar, $day_fr, $startTime, $endTime);
        }

        //handel the day
        if ($request->has('tuesday')) {
            //day translation
            $day_en = 'tuesday';
            $day_fr = 'Mardi';
            $day_ar = 'الثلاثاء';

            //get the start and end time
            $startTime = $request->tuesdayStartTime;
            $endTime = $request->tuesdayEndTime;

            //create Study Day
            $this->createStudyDay($group->id, $day_en, $day_ar, $day_fr, $startTime, $endTime);
        }

        //handel the day
        if ($request->has('wednesday')) {
            //day translation
            $day_en = 'wednesday';
            $day_fr = 'Mercredi';
            $day_ar = 'الأربعاء';

            //get the start and end time
            $startTime = $request->wednesdayStartTime;
            $endTime = $request->wednesdayEndTime;

            //create Study Day
            $this->createStudyDay($group->id, $day_en, $day_ar, $day_fr, $startTime, $endTime);
        }

        //handel the day
        if ($request->has('thursday')) {
            //day translation
            $day_en = 'thursday';
            $day_fr = 'Jeudi';
            $day_ar = 'الخميس';

            //get the start and end time
            $startTime = $request->thursdayStartTime;
            $endTime = $request->thursdayEndTime;

            //create Study Day
            $this->createStudyDay($group->id, $day_en, $day_ar, $day_fr, $startTime, $endTime);
        }

        //handel the day
        if ($request->has('friday')) {
            //day translation
            $day_en = 'friday';
            $day_fr = 'Vendredi';
            $day_ar = 'الجمعة';

            //get the start and end time
            $startTime = $request->fridayStartTime;
            $endTime = $request->fridayEndTime;

            //create Study Day
            $this->createStudyDay($group->id, $day_en, $day_ar, $day_fr, $startTime, $endTime);
        }

        return redirect()->back()->with('success', trans('website/messages.group add successfully'));
    }

    public function createStudyDay($groupId, $day_en, $day_ar, $day_fr, $StartTime, $endTime)
    {
        StudyDay::create([
            'group_id' => $groupId,
            'day' => ['en' => $day_en, 'ar' => $day_ar, 'fr' => $day_fr],
            'startTime' => $StartTime,
            'endTime' => $endTime,
        ]);
    }

    public function editGroup(Request $request)
    {
        $group = Group::find($request->group_id);

        $studyDays = $group->studyDays;

        foreach ($studyDays as $studyDay) {
            $days[] = $studyDay->getTranslations()['day']['en'];
            $startTimes [$studyDay->getTranslations()['day']['en'] . "StartTime"] = $studyDay->startTime;
            $endTimes [$studyDay->getTranslations()['day']['en'] . "EndTime"] = $studyDay->endTime;
        }

        $sup_courses = SupportingCourse::all();
        $lang_courses = LanguageCourse::all();
        $inten_courses = IntensiveCourse::all();

        return view('website.admin.groupe.editGroup',
            compact('group', 'sup_courses', 'lang_courses', 'inten_courses', 'days', 'startTimes', 'endTimes'));
    }

    public function updateGroup(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255', // Adjust max length as needed
            'courseable_type' => 'required|string',
            // Add specific validation rules for each course type if needed
            'supportingCourse_id' => 'required_if:courseable_type,App\Models\Course\SupportingCourse|numeric',
            'languagesCourse_id' => 'required_if:courseable_type,App\Models\Course\LanguageCourse|numeric',
            'intensiveCourse_id' => 'required_if:courseable_type,App\Models\Course\IntensiveCourse|numeric',
        ]);

        //specific the course type and the course id
        if ($request->courseable_type === "App\Models\Course\SupportingCourse") {
            $courseType = "App\Models\Course\SupportingCourse";
            $cours_id = $request->supportingCourse_id;
        } elseif
        ($request->courseable_type === "App\Models\Course\LanguageCourse") {
            $courseType = "App\Models\Course\LanguageCourse";
            $cours_id = $request->languagesCourse_id;
        } elseif ($request->courseable_type === "App\Models\Course\IntensiveCourse") {
            $courseType = "App\Models\Course\IntensiveCourse";
            $cours_id = $request->intensiveCourse_id;
        }

        //get the group
        $group = Group::find($request->group_id);

        //update the group
        $group->update([
            'name' => $request->name,
            'courseable_type' => $courseType,
            'courseable_id' => $cours_id,
        ]);

        //delete study days
        $group->studyDays()->delete();

        $group->save();

        //handel the day
        if ($request->has('saturday')) {
            //day translation
            $day_en = 'saturday';
            $day_fr = 'Samedi';
            $day_ar = 'السبت';

            //get the start and end time
            $startTime = $request->saturdayStartTime;
            $endTime = $request->saturdayEndTime;

            //create Study Day
            $this->createStudyDay($group->id, $day_en, $day_ar, $day_fr, $startTime, $endTime);
        }
        //handel the day
        if ($request->has('sunday')) {
            //day translation
            $day_en = 'sunday';
            $day_fr = 'Dimanche';
            $day_ar = 'الأحد';

            //get the start and end time
            $startTime = $request->sundayStartTime;
            $endTime = $request->sundayEndTime;

            //create Study Day
            $this->createStudyDay($group->id, $day_en, $day_ar, $day_fr, $startTime, $endTime);
        }
        //handel the day
        if ($request->has('monday')) {
            //day translation
            $day_en = 'monday';
            $day_fr = 'Lundi';
            $day_ar = 'الإثنين';

            //get the start and end time
            $startTime = $request->mondayStartTime;
            $endTime = $request->mondayEndTime;

            //create Study Day
            $this->createStudyDay($group->id, $day_en, $day_ar, $day_fr, $startTime, $endTime);
        }
        //handel the day
        if ($request->has('tuesday')) {
            //day translation
            $day_en = 'tuesday';
            $day_fr = 'Mardi';
            $day_ar = 'الثلاثاء';

            //get the start and end time
            $startTime = $request->tuesdayStartTime;
            $endTime = $request->tuesdayEndTime;

            //create Study Day
            $this->createStudyDay($group->id, $day_en, $day_ar, $day_fr, $startTime, $endTime);
        }
        //handel the day
        if ($request->has('wednesday')) {
            //day translation
            $day_en = 'wednesday';
            $day_fr = 'Mercredi';
            $day_ar = 'الأربعاء';

            //get the start and end time
            $startTime = $request->wednesdayStartTime;
            $endTime = $request->wednesdayEndTime;

            //create Study Day
            $this->createStudyDay($group->id, $day_en, $day_ar, $day_fr, $startTime, $endTime);
        }
        //handel the day
        if ($request->has('thursday')) {
            //day translation
            $day_en = 'thursday';
            $day_fr = 'Jeudi';
            $day_ar = 'الخميس';

            //get the start and end time
            $startTime = $request->thursdayStartTime;
            $endTime = $request->thursdayEndTime;

            //create Study Day
            $this->createStudyDay($group->id, $day_en, $day_ar, $day_fr, $startTime, $endTime);
        }
        //handel the day
        if ($request->has('friday')) {
            //day translation
            $day_en = 'friday';
            $day_fr = 'Vendredi';
            $day_ar = 'الجمعة';

            //get the start and end time
            $startTime = $request->fridayStartTime;
            $endTime = $request->fridayEndTime;

            //create Study Day
            $this->createStudyDay($group->id, $day_en, $day_ar, $day_fr, $startTime, $endTime);
        }

        return redirect()->back()->with('success', trans('website/messages.The group information is updated successfully'));
    }

    public function deleteGroup(Request $request)
    {
        //delete specific group
        $group = Group::find($request->group_id);
        $group->delete();

        return redirect()->back()->with('success', trans('website/messages.The group deleted successfully'));
    }

    public function ajaxFilterGroup(Request $request)
    {
        $all_groups = Group::all();
        $groups = [];

        if ($request->courseType === "supportingCourse") {
            // get the supporting course groups
            $sup_courses_groups = $all_groups
                ->where('courseable_type', 'App\Models\Course\SupportingCourse');

            //check if there are no level or year field
            if (!$request->has('supportingCourseLevel') && !$request->has('high_school_year')
                && !$request->has('secondary_school_year')
                && !$request->has('primary_school_year')) {
                foreach ($sup_courses_groups as $group) {
                    $groups [] = $group;
                }
            }


            //check if there are level field
            if ($request->has('supportingCourseLevel') && (!$request->has('high_school_year')
                    && !$request->has('secondary_school_year')
                    && !$request->has('primary_school_year'))) {
                foreach ($sup_courses_groups as $group) {

                    //check if the course level equal the level filter
                    $courseLevel = $group->courseable->getTranslations()['level']['en'];
                    if ($courseLevel == $request->supportingCourseLevel) {
                        $groups [] = $group;
                    }
                }
            }


            //check if there are level and year field
            if ($request->has('supportingCourseLevel') && ($request->has('high_school_year')
                    || $request->has('secondary_school_year')
                    || $request->has('primary_school_year')) && $request->instructor_id == null) {
                foreach ($sup_courses_groups as $group) {

                    //check if the course level equal the level filter and year course equal the year filter
                    $courseLevel = $group->courseable->getTranslations()['level']['en'];
                    $courseYear = $group->courseable->year;
                    if ($courseLevel == $request->supportingCourseLevel && $courseYear == $request->high_school_year
                        || $courseYear == $request->secondary_school_year
                        || $courseYear == $request->primary_school_year) {
                        $groups [] = $group;
                    }
                }
            }

            //check if there are level and year field
            if ($request->has('supportingCourseLevel') && ($request->has('high_school_year')
                    || $request->has('secondary_school_year')
                    || $request->has('primary_school_year')) && $request->instructor_id != null) {

                foreach ($sup_courses_groups as $group) {

                    //check if the course level equal the level filter and year course equal the year filter
                    $courseLevel = $group->courseable->getTranslations()['level']['en'];
                    $courseYear = $group->courseable->year;
                    $courseInstructorId = $group->courseable->instructor->id;

                    if ($courseLevel == $request->supportingCourseLevel && ($courseYear == $request->high_school_year || $courseYear == $request->secondary_school_year
                            || $courseYear == $request->primary_school_year)) {
                        if ($courseInstructorId == $request->instructor_id)
                            $groups [] = $group;
                    }
                }
            }
        }

        if ($request->courseType === "languagesCourse") {
            // get the languages course enrollments
            $lang_courses_groups = $all_groups
                ->where('courseable_type', 'App\Models\Course\LanguageCourse');

            //check if there are no level or year field
            if (!$request->has('languagesCourseLevel')) {
                foreach ($lang_courses_groups as $group) {
                    $groups [] = $group;
                }
            }

            //check if there are level field
            if ($request->has('languagesCourseLevel') && $request->instructor_id == null) {
                foreach ($lang_courses_groups as $group) {

                    //check if the course level equal the level filter
                    $courseLevel = $group->courseable->getTranslations()['level']['en'];
                    if ($courseLevel == $request->languagesCourseLevel) {
                        $groups [] = $group;
                    }
                }
            }

            //check if there are level field and instructor
            if ($request->has('languagesCourseLevel') && $request->instructor_id != null) {
                foreach ($lang_courses_groups as $group) {

                    //check if the course level equal the level filter
                    $courseLevel = $group->courseable->getTranslations()['level']['en'];
                    $courseInstructorId = $group->courseable->instructor->id;
                    if ($courseLevel == $request->languagesCourseLevel && $courseInstructorId == $request->instructor_id) {
                        $groups [] = $group;
                    }
                }
            }
        }

        if ($request->courseType === "intensiveCourse") {
            // get the intensive course enrollments
            $inten_courses_groups = $all_groups
                ->where('courseable_type', 'App\Models\Course\IntensiveCourse');

            //check if there are no level or year field
            if (!$request->has('intensiveCourseLevel')) {
                foreach ($inten_courses_groups as $group) {
                    $groups [] = $group;
                }
            }

            //check if there are level field
            if ($request->has('intensiveCourseLevel') && $request->instructor_id == null) {
                foreach ($inten_courses_groups as $group) {

                    //check if the course level equal the level filter
                    $courseLevel = $group->courseable->getTranslations()['level']['en'];
                    if ($courseLevel == $request->intensiveCourseLevel) {
                        $groups [] = $group;
                    }
                }
            }

            //check if there are level field
            if ($request->has('intensiveCourseLevel') && $request->instructor_id != null) {
                foreach ($inten_courses_groups as $group) {

                    //check if the course level equal the level filter
                    $courseLevel = $group->courseable->getTranslations()['level']['en'];
                    $courseInstructorId = $group->courseable->instructor->id;
                    if ($courseLevel == $request->intensiveCourseLevel && $courseInstructorId == $request->instructor_id) {
                        $groups [] = $group;
                    }
                }
            }
        }

        //Removes duplicate groups from an array
        $groups = array_unique($groups, SORT_REGULAR);

        return view('website.admin.groupe.ajaxFilterGroupsByCourse', compact('groups'));
    }
}
