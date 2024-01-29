<?php

namespace App\Http\Controllers;

use App\Models\Course\IntensiveCourse;
use App\Models\Course\LanguageCourse;
use App\Models\Course\SupportingCourse;
use App\Models\Enrollment;
use App\Models\Group;
use App\Models\Instructor;
use App\Models\Notification;
use App\Models\Session;
use App\Models\SubscriptionCCP;
use App\Models\SubscriptionCode;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use TheHocineSaad\LaravelChargilyEPay\Models\Epay_Invoice;

class StudentController extends Controller
{
    public function index()
    {
        $sup_courses = SupportingCourse::where('status', 1)->inRandomOrder()->take(10)->get();
        $lang_courses = LanguageCourse::where('status', 1)->inRandomOrder()->take(10)->get();
        $inten_courses = IntensiveCourse::where('status', 1)->inRandomOrder()->take(10)->get();

        $enrolls_number = Enrollment::all()->count();
        $instructors_number = Instructor::all()->count();
        $courses_number = SupportingCourse::all()->count() + LanguageCourse::all()->count() + IntensiveCourse::all()->count();

        $trend_inten_courses = IntensiveCourse::where('status', 1)->withCount('enrollments')
            ->orderByDesc('enrollments_count') // Order by enrollments count in descending order
            ->take(4) // Get the first 4 courses
            ->get();

        return view('website.user.dashboard',
            compact('sup_courses', 'lang_courses', 'inten_courses', 'enrolls_number', 'instructors_number', 'courses_number', 'trend_inten_courses'));

    }

    public function myCourse()
    {
        $student = Auth::guard('web')->user();

        $studentEnrollments = $student->enrollments
            ->where('status', 1)
            ->where('endDate', '>=', now());


        return view('website.user.myCourses', compact('studentEnrollments'));
    }

    public function profile()
    {
        $student = Auth::guard('web')->user();

        return view('website.user.profile.profile', compact('student'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'student_id' => ['required', 'string'],
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($request->student_id)],
            'bio' => ['nullable', 'string'],
            'phone' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($request->student_id)],
            'state' => ['required', 'string', 'max:255'],
            'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'], // Adjust as per your image requirements
            'gender' => ['required', 'string', 'max:255'],
        ]);

        $student = Auth::guard('web')->user();

        if ($request->hasFile('photo')) {
            $file_extention = $request->photo->getClientOriginalExtension();
            $file_name = time() . '.' . $file_extention;
            $path = 'images/profiles';

            $request->photo->move($path, $file_name);
            $student->photo = $file_name;
        }

        $student->firstName = $request->firstName;
        $student->lastName = $request->lastName;
        $student->email = $request->email;
        $student->gender = $request->gender;
        $student->state = $request->state;

        //check if phone changed or not
        if ($student->phone != $request->phone) {
            $student->phone_verified_at = null;
            $student->expired_at = null;
            $student->code = null;
            $student->phone = $request->phone;
        }

        $student->bio = $request->bio;
        $student->save();

        return redirect()->back()->with('message_profile_updated', trans('website/messages.Your profile is updated Successfully'));
    }

    public function password()
    {
        $student = Auth::guard('web')->user();
        return view('website.user.profile.changepassword', compact('student'));
    }

    public function changePassword(Request $request)
    {
        $student = Auth::guard('web')->user();

        if (Hash::check($request->oldPassword, $student->password)) {

            $student->password = Hash::make($request->newPassword);
            $student->save();

            return redirect()->back()->with('message_password_changed', trans('website/messages.Your password was change it Successfully'));
        } else {
            return redirect()->back()->with('message_oldPassword_incorrect', trans('website/messages.Your old password is incorrect !'));
        }
    }

    public function socialMedia()
    {
        $student = Auth::guard('web')->user();

        return view('website.user.profile.socailmedia', compact('student'));
    }

    public function zoomPage(Request $request)
    {
        $student = Auth::guard('web')->user();

        if ($request->courseType === 'supportingCourse') {

            $course = SupportingCourse::where('slug', $request->slug)->first();

            //get the student group
            foreach ($course->groups as $group) {
                if ($group->members->where('student_id', $student->id)->count() > 0) {
                    $studentGroup = $group;
                }
            }

            //check the endDate of the last enrollment
            $lastEnrollment = $studentGroup->courseable->enrollments
                ->where('student_id', $student->id)
                ->where('courseable_type', 'App\Models\Course\SupportingCourse')
                ->where('courseable_id', $course->id)
                ->last();
            if ($lastEnrollment->endDate < now())
                return redirect()->back()->with('warning', trans('website/messages.you subscription is ended on this course at ') . $lastEnrollment->endDate);

            //get the student group
            foreach ($studentGroup->courseable->enrollments->where('student_id', $student->id) as $enrollment) {
                if ($enrollment->where('student_id', $student->id)->count() > 0) {
                    $studentGroup = $group;
                }
            }

            if ($studentGroup->sessions->isEmpty())
                return redirect()->back()->with('message_no_sessions', trans('website/messages.there are no sessions in this course yet !'));

            return view('website.user.zoom.zoompage', compact('course', 'studentGroup'));
        }

        if ($request->courseType === 'languagesCourse') {
            $course = LanguageCourse::where('slug', $request->slug)->first();

            //get the student group
            foreach ($course->groups as $group) {
                if ($group->members->where('student_id', $student->id)->count() > 0) {
                    $studentGroup = $group;
                }
            }

            //check the endDate of the last enrollment
            $lastEnrollment = $studentGroup->courseable->enrollments
                ->where('student_id', $student->id)
                ->where('courseable_type', 'App\Models\Course\LanguageCourse')
                ->where('courseable_id', $course->id)
                ->last();
            if ($lastEnrollment->endDate < now())
                return redirect()->back()->with('warning', trans('website/messages.you subscription is ended on this course at ') . $lastEnrollment->endDate);

            if ($studentGroup->sessions->isEmpty())
                return redirect()->back()->with('message_no_sessions', trans('website/messages.there are no sessions in this course yet !'));

            return view('website.user.zoom.zoompage', compact('course', 'studentGroup'));
        }

        if ($request->courseType === 'intensiveCourse') {
            $course = IntensiveCourse::where('slug', $request->slug)->first();

            //get the student group
            foreach ($course->groups as $group) {
                if ($group->members->where('student_id', $student->id)->count() > 0) {
                    $studentGroup = $group;
                }
            }

            //check the endDate of the last enrollment
            $lastEnrollment = $studentGroup->courseable->enrollments
                ->where('student_id', $student->id)
                ->where('courseable_type', 'App\Models\Course\IntensiveCourse')
                ->where('courseable_id', $course->id)
                ->last();
            if ($lastEnrollment->endDate < now())
                return redirect()->back()->with('warning', trans('website/messages.you subscription is ended on this course at ') . $lastEnrollment->endDate);

            if ($studentGroup->sessions->isEmpty())
                return redirect()->back()->with('message_no_sessions', trans('website/messages.there are no sessions in this course yet !'));

            return view('website.user.zoom.zoompage', compact('course', 'studentGroup'));
        }
    }

    public function specificZoom(Request $request)
    {
        $specificSession = Session::where('id', $request->session_id)->first();

        return view('website.user.zoom.specificZoompage', compact('specificSession'));
    }

    public function specificZoomFromNotification(Request $request)
    {
        //get the notification id and change the read_at column to now
        $notifyId = DB::table('notifications')
            ->where('data->sessionId', $request->session_id)
            ->where('notifiable_id', Auth::guard('web')->id())
            ->where('notifiable_type', 'App\Models\User')
            ->pluck('id');

        if (!$notifyId->isEmpty()) {
            $notification = DB::table('notifications')->where('id', $notifyId)->get();
            $read_at = $notification[0]->read_at;
            if ($read_at == null)
                DB::table('notifications')->where('id', $notifyId)->update(['read_at' => now()]);
        }

//        $specificSession = Session::where('id', $request->session_id)->first();
//        return view('website.user.zoom.specificZoompage', compact('specificSession'));

        return redirect()->back();
    }

    public function myCourseFromNotification(Request $request)
    {
        //get the notification id and change the read_at column to now
        $notifyId = DB::table('notifications')
            ->where('data->subscription_id', $request->subscription_id)
            ->where('notifiable_id', Auth::guard('web')->id())
            ->where('notifiable_type', 'App\Models\User')
            ->pluck('id');

        if (!$notifyId->isEmpty()) {
            $notification = DB::table('notifications')->where('id', $notifyId)->get();
            $read_at = $notification[0]->read_at;
            if ($read_at == null)
                DB::table('notifications')->where('id', $notifyId)->update(['read_at' => now()]);
        }

//        $student = Auth::guard('web')->user();
//        $studentEnrollments = $student->enrollments;
//        return view('website.user.myCourses', compact('studentEnrollments'));

        return redirect()->back();

    }

    public function readNotification(Request $request)
    {
        $notifyId = $request->notificationId;

        $notification = DB::table('notifications')->where('id', $notifyId)->get();

        $read_at = $notification[0]->read_at;
        if ($read_at == null)
            DB::table('notifications')->where('id', $notifyId)->update(['read_at' => now()]);

        return redirect()->back();
    }

    public function resourceDownload(Request $request)
    {
        return response()->download(public_path('files/' . $request->filename));
    }

    public function activeSubscriptionCode(Request $request)
    {
        $subscriptionCode = SubscriptionCode::where('code', $request->subscriptionCode)
            ->first();

        if ($subscriptionCode != null) {
            if ($subscriptionCode->status) {
                $student = Auth::guard('web')->user();

                $student->balance += $subscriptionCode->balance;
                $student->save();

                $subscriptionCode->status = 0;
                $subscriptionCode->save();

                return redirect()->back()->with('success', trans('website/messages. the amount ') . $subscriptionCode->balance . trans('website/messages. add to your balance'));
            } else {
                return redirect()->back()->with('warning', trans('website/messages. the code you entre is used !'));
            }
        } else {
            return redirect()->back()->with('warning', trans('website/messages. the code you entre is incorrect'));
        }
    }
}
