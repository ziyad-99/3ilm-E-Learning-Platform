<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Course\IntensiveCourse;
use App\Models\Course\LanguageCourse;
use App\Models\Course\SupportingCourse;
use App\Models\Enrollment;
use App\Models\WaitingList;
use App\Notifications\EnrollmentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class WaitingListController extends Controller
{
    public function store(Request $request)
    {
        $student = Auth::guard('web')->user();

        $supCourseType = 'App\Models\Course\SupportingCourse';
        $langCourseType = 'App\Models\Course\LanguageCourse';
        $intenCourseType = 'App\Models\Course\IntensiveCourse';

        if ($request->courseType === 'supportingCourse') {

            $course = SupportingCourse::where('slug', $request->slug)->first();

            //check if student already enrolled
            $isEnrolled = $student->enrollments()
                ->where('courseable_type', $supCourseType)
                ->where('courseable_id', $course->id)
                ->get()
                ->last();
            if ($isEnrolled != null && $isEnrolled->endDate >= now())
                return redirect()->back()->with('message_add_waitingList', trans('website/messages.Your already enrolled in this course, subscription ended at ') . $isEnrolled->endDate);

            //check if there are group_selected in request
            if ($request->has('group_selected')) {
                $group_selected = $request->group_selected;
            } else {
                $group_selected = $request->group_selected;
            }

            //check if there are monthsNumber in request
            if ($request->has('monthsNumber')) {
                $monthsNumber = $request->monthsNumber;
            } else {
                $monthsNumber = 1;
            }

            //check balance of student
            if ($student->balance >= $course->price * $monthsNumber) {
                $isWaiting = $student->waitingLists()
                    ->where('courseable_type', $supCourseType)
                    ->where('courseable_id', $course->id)
                    ->where('status', 0)
                    ->get();

                if ($isWaiting->isEmpty()) {

                    $watingList = WaitingList::create([
                        'student_id' => $student->id,
                        'courseable_id' => $course->id,
                        'courseable_type' => $supCourseType,
                        'date' => now(),
                        'group_selected' => $group_selected,
                        'monthsNumber' => $monthsNumber,
                    ]);

                    //send Notification to admins
                    $this->notificationEnrollmentRequest($course->title, $watingList->id, $request->courseType);

                    return redirect()->back()->with('message_add_waitingList', trans('website/messages.Your in waiting list of this course'));
                } else {
                    return redirect()->back()->with('message_already_waitingList', trans('website/messages.Your already on the waiting list, Wait the Admin until Accept you !'));
                }
            } else {
                return redirect()->back()->with('message_balance_less', trans('website/messages.You balance is less, cant enroll in this course !'));
            }
        }

        if ($request->courseType === 'LanguageCourse') {

            $course = LanguageCourse::where('slug', $request->slug)->first();

            //check if student already enrolled
            $isEnrolled = $student->enrollments()
                ->where('courseable_type', $langCourseType)
                ->where('courseable_id', $course->id)
                ->get()
                ->last();
            if ($isEnrolled != null && $isEnrolled->endDate >= now())
                return redirect()->back()->with('message_add_waitingList', trans('website/messages.Your already enrolled in this course, subscription ended at ') . $isEnrolled->endDate);

            //check if there are group_selected in request
            if ($request->has('group_selected')) {
                $group_selected = $request->group_selected;
            } else {
                $group_selected = null;
            }

            //check if there are monthsNumber in request
            if ($request->has('monthsNumber')) {
                $monthsNumber = $request->monthsNumber;
            } else {
                $monthsNumber = 1;
            }

            if ($student->balance >= $course->price * $monthsNumber) {

                $isWaiting = $student->waitingLists()
                    ->where('courseable_type', $langCourseType)
                    ->where('courseable_id', $course->id)
                    ->where('status', 0)
                    ->get();

                if ($isWaiting->isEmpty()) {

                    $watingList = WaitingList::create([
                        'student_id' => $student->id,
                        'courseable_id' => $course->id,
                        'courseable_type' => $langCourseType,
                        'date' => now(),
                        'group_selected' => $group_selected,
                        'monthsNumber' => $monthsNumber,
                    ]);

                    //send Notification to admins
                    $this->notificationEnrollmentRequest($course->title, $watingList->id, $request->courseType);

                    return redirect()->back()->with('message_add_waitingList', trans('website/messages.Your in waiting list of this course'));

                } else {
                    return redirect()->back()->with('message_already_waitingList', trans('website/messages.Your already on the waiting list, Wait the Admin until Accept you !'));
                }
            } else {
                return redirect()->back()->with('message_balance_less', trans('website/messages.this student can not enroll in this course his balance is less '));
            }
        }

        if ($request->courseType === 'IntensiveCourse') {

            $course = IntensiveCourse::where('slug', $request->slug)->first();

            //check if student already enrolled
            $isEnrolled = $student->enrollments()
                ->where('courseable_type', $intenCourseType)
                ->where('courseable_id', $course->id)
                ->get()
                ->last();
            if ($isEnrolled != null && $isEnrolled->endDate >= now())
                return redirect()->back()->with('message_add_waitingList', trans('website/messages.Your already enrolled in this course, subscription ended at ') . $isEnrolled->endDate);

            //check if there are group_selected in request
            if ($request->has('group_selected')) {
                $group_selected = $request->group_selected;
            } else {
                $group_selected = $request->group_selected;
            }

            //check if there are monthsNumber in request
            if ($request->has('monthsNumber')) {
                $monthsNumber = $request->monthsNumber;
            } else {
                $monthsNumber = 1;
            }

            if ($student->balance >= $course->price * $monthsNumber) {

                $isWaiting = $student->waitingLists()
                    ->where('courseable_type', $intenCourseType)
                    ->where('courseable_id', $course->id)
                    ->where('status', 0)
                    ->get();

                if ($isWaiting->isEmpty()) {

                    $watingList = WaitingList::create([
                        'student_id' => $student->id,
                        'courseable_id' => $course->id,
                        'courseable_type' => $intenCourseType,
                        'date' => now(),
                        'group_selected' => $group_selected,
                        'monthsNumber' => $monthsNumber,
                    ]);

                    //send Notification to admins
                    $this->notificationEnrollmentRequest($course->title, $watingList->id, $request->courseType);

                    return redirect()->back()->with('message_add_waitingList', trans('website/messages.Your in waiting list of this course'));

                } else {
                    return redirect()->back()->with('message_already_waitingList', trans('website/messages.Your already on the waiting list, Wait the Admin until Accept you !'));
                }
            } else {
                return redirect()->back()->with('message_balance_less', trans('website/messages.this student can not enroll in this course his balance is less '));
            }
        }
    }

    public function notificationEnrollmentRequest($courseTitle, $subscription_id, $courseType)
    {
        $admins = Admin::all();
        Notification::send($admins, new EnrollmentRequest($courseTitle, $subscription_id, $courseType));
    }

    public function showWaitingList()
    {
        $student = Auth::guard('web')->user();

        $supWaiting = $student->waitingLists()
            ->where('student_id', $student->id)
            ->where('courseable_type', 'App\Models\Course\SupportingCourse')
            ->get();

        $langWaiting = $student->waitingLists()
            ->where('student_id', $student->id)
            ->where('courseable_type', 'App\Models\Course\LanguageCourse')
            ->get();

        $intenWaiting = $student->waitingLists()
            ->where('student_id', $student->id)
            ->where('courseable_type', 'App\Models\Course\IntensiveCourse')
            ->get();

        return view('website.user.myWaitingList',
            compact('supWaiting', 'langWaiting', 'intenWaiting'));
    }

    public function accept(Request $request)
    {
        $student = Auth::guard('web')->user();

        if ($request->courseType === 'supportingCourse') {

            $supCourse = SupportingCourse::where('slug', $request->slug)->first();

            $supWaiting = $student->waitingLists()
                ->where('student_id', $student->id)
                ->where('courseable_type', 'App\Models\Course\SupportingCourse')
                ->where('courseable_id', $supCourse->id)
                ->first();

            if ($student->balance >= $supCourse->price) {
                Enrollment::create([
                    'student_id' => $student->id,
                    'courseable_id' => $supCourse->id,
                    'courseable_type' => 'App\Models\Course\SupportingCourse',
                    'date' => now(),
                ]);

                $student->balance = $student->balance - $supCourse->price;
                $student->save();

                $supWaiting->delete();
            }
        }

        if ($request->courseType === 'LanguageCourse') {
            $supCourse = LanguageCourse::where('slug', $request->slug)->first();

            $supWaiting = $student->waitingLists()
                ->where('student_id', $student->id)
                ->where('courseable_type', 'App\Models\Course\LanguageCourse')
                ->where('courseable_id', $supCourse->id)
                ->first();

            if ($student->balance >= $supCourse->price) {
                Enrollment::create([
                    'student_id' => $student->id,
                    'courseable_id' => $supCourse->id,
                    'courseable_type' => 'App\Models\Course\LanguageCourse',
                    'date' => now(),
                ]);

                $student->balance = $student->balance - $supCourse->price;
                $student->save();

                $supWaiting->delete();
            }
        }

        if ($request->courseType === 'IntensiveCourse') {
            $supCourse = IntensiveCourse::where('slug', $request->slug)->first();

            $supWaiting = $student->waitingLists()
                ->where('student_id', $student->id)
                ->where('courseable_type', 'App\Models\Course\IntensiveCourse')
                ->where('courseable_id', $supCourse->id)
                ->first();

            if ($student->balance >= $supCourse->price) {
                Enrollment::create([
                    'student_id' => $student->id,
                    'courseable_id' => $supCourse->id,
                    'courseable_type' => 'App\Models\Course\IntensiveCourse',
                    'date' => now(),
                ]);

                $student->balance = $student->balance - $supCourse->price;
                $student->save();

                $supWaiting->delete();
            }
        }

        return '<h3>you are accepted student enrollment !!</h3>';
    }
}
