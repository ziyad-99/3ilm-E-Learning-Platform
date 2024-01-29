<?php

namespace App\Http\Controllers;

use App\Models\Course\IntensiveCourse;
use App\Models\Course\LanguageCourse;
use App\Models\Course\SupportingCourse;
use App\Models\Enrollment;
use App\Models\Group;
use App\Models\Instructor;
use App\Models\Ressource;
use App\Models\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class InstructorController extends Controller
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

        return view('website.instructor.dashboard',
            compact('sup_courses', 'lang_courses', 'inten_courses', 'enrolls_number', 'instructors_number', 'courses_number', 'trend_inten_courses'));
    }

    public function create()
    {
        //
    }

    public function myCourse()
    {

        $instructor = Auth::guard('instructor')->user();

        $my_sup_courses = $instructor->supCourse;
        $my_lang_courses = $instructor->langCourse;
        $my_inten_courses = $instructor->intenCourse;

        return view('website.instructor.myCourses', compact('my_sup_courses', 'my_lang_courses', 'my_inten_courses'));
    }

    public function courseGroup(Request $request)
    {
        $sessionOrResourceOrQuiz = $request->sessionOrResourceOrQuiz;

        if ($request->courseType === 'supportingCourse') {
            $course = SupportingCourse::where('slug', $request->slug)->first();
            $groups = $course->groups;
        }

        if ($request->courseType === 'languagesCourse') {
            $course = LanguageCourse::where('slug', $request->slug)->first();
            $groups = $course->groups;
        }

        if ($request->courseType === 'intensiveCourse') {
            $course = IntensiveCourse::where('slug', $request->slug)->first();
            $groups = $course->groups;
        }

        return view('website.instructor.zoom.courseGroups', compact('course', 'sessionOrResourceOrQuiz'));
    }

    public function zoomPage(Request $request)
    {
        if ($request->courseType === 'supportingCourse') {

            $group = Group::find($request->group_id);

            if ($group->sessions->isEmpty())
                return redirect()->back()->with('message_no_sessions', trans('website/messages.there are no sessions in this group yet !'));

            $courseType = $request->courseType;

            return view('website.instructor.zoom.zoompage', compact('group', 'courseType'));
        }

        if ($request->courseType === 'languagesCourse') {

            $group = Group::find($request->group_id);

            if ($group->sessions->isEmpty())
                return redirect()->back()->with('message_no_sessions', trans('website/messages.there are no sessions in this group yet !'));

            $courseType = $request->courseType;

            return view('website.instructor.zoom.zoompage', compact('group', 'courseType'));
        }

        if ($request->courseType === 'intensiveCourse') {
            $course = IntensiveCourse::where('slug', $request->slug)->first();

            if ($course->sessions->isEmpty())
                return redirect()->back()->with('message_no_sessions', trans('website/messages.there are no sessions in this group yet !'));

            $courseType = $request->courseType;

            return view('website.instructor.zoom.zoompage', compact('course', 'courseType'));
        }
    }

    public function specificZoom(Request $request)
    {
//        return $request->session_id;

//        $session = Session::find($request->session_id);

//        return $session->courseable->slug;

        $courseType = $request->courseType;

        $specificSession = Session::where('id', $request->session_id)->first();

        return view('website.instructor.zoom.specificZoompage', compact('specificSession', 'courseType'));
    }

    public function quiz()
    {
        return view('website.instructor.quiz.addQuizContainer');
    }

    public function profile()
    {
        $instructor = Auth::guard('instructor')->user();

        return view('website.instructor.profile.profile', compact('instructor'));
    }

    public function updateProfile(Request $request)
    {

        $request->validate([
            'instructor_id' => ['required', 'string', 'max:255'],
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('instructors')->ignore($request->instructor_id)],
            'bio' => ['nullable', 'string'],
            'phone' => ['required', 'string', 'max:10', Rule::unique('instructors')->ignore($request->instructor_id)],
            'state' => ['required', 'string', 'max:255'],
            'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'], // Adjust as per your image requirements
            'gender' => ['required', 'string', 'max:255'],
        ]);

        $instructor = Auth::guard('instructor')->user();

        if ($request->hasFile('photo')) {
            $file_extention = $request->photo->getClientOriginalExtension();
            $file_name = time() . '.' . $file_extention;
            $path = 'images/profiles';

            $request->photo->move($path, $file_name);
            $instructor->photo = $file_name;
        }

        $instructor->firstName = $request->firstName;
        $instructor->lastName = $request->lastName;
        $instructor->email = $request->email;
        $instructor->gender = $request->gender;
        $instructor->state = $request->state;

        //check if phone changed or not
        if ($instructor->phone != $request->phone) {
            $instructor->phone_verified_at = null;
            $instructor->expired_at = null;
            $instructor->code = null;
            $instructor->phone = $request->phone;
        }

        $instructor->bio = $request->bio;
        $instructor->save();

        return redirect()->back()->with('message_profile_updated', trans('website/messages.Your profile is updated Successfully'));
    }

    public function password()
    {
        $instructor = Auth::guard('instructor')->user();

        return view('website.instructor.profile.changepassword', compact('instructor'));
    }

    public function changePassword(Request $request)
    {
        $instructor = Auth::guard('instructor')->user();

        if (Hash::check($request->oldPassword, $instructor->password)) {

            $instructor->password = Hash::make($request->newPassword);
            $instructor->save();

            return redirect()->back()->with('message_password_changed', trans('website/messages.Your password was change it Successfully'));
        } else {
            return redirect()->back()->with('message_oldPassword_incorrect', trans('website/messages.Your old password is incorrect !'));
        }
    }

    public function socialMedia()
    {
        $instructor = Auth::guard('instructor')->user();

        return view('website.instructor.profile.socailmedia', compact('instructor'));
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
}
